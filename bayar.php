<?php
session_start();
error_reporting(0);
include 'koneksi.php';
		
// jika tidak ada session login, maka ditujukan ke login
if (!isset($_SESSION["pelanggan"])) {
	# code...
	echo "<script>alert('Silahkan Log In');</script>";
	echo "<script>window.location='form_login.php';</script>";
}
?>
<?php 	
include 'koneksi.php';
		session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Out</title>
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
		<?php 	include'navbar.php'; ?>

		<section class="konten">
		<div class="container">
			<h1>Check Out</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Produk</th>
						<th>Harga Per Kilo</th>
						<th>Jumlah Beli</th>
						<th>Harga Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1;?>
					<?php 	$totalbelanja=0; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<?php
					$ambil=$koneksi->query("select *from produk where id_produk='$id_produk'");
					$pecah=$ambil->fetch_assoc();
					$harga=$pecah['harga_produk'];
					$harga_total=$harga*$jumlah;
					//echo "<pre>";
					//print_r($pecah);
					//echo "</pre>";
					?>
					<tr>
						<td><?php echo $nomor;?>.</td>
						<td><?php echo $pecah['nama_produk'];?></td>
						<td>Rp.<?php echo number_format($pecah['harga_produk']);?></td>
						<td><?php echo $jumlah?> Kg</td>
						<td>Rp.<?php echo number_format($harga_total) ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>
					</tr>
					<?php $totalbelanja+=$harga_total ?>
					<?php $nomor++;?>
					<?php endforeach?>
				</tbody>
				<tfoot>
					<th>Total Pembayaran</th>
					<th colspan="5">Rp. <?php echo number_format($totalbelanja) ?></th>
				</tfoot>
			</table>

			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_lengkap_pelanggan'];?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['alamat_pelanggan'];?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<select class="form-control" name="id_ongkir">
								<option value="">Pilih Tujuan Pengiriman</option>
								<?php 	
									$ambil=$koneksi->query("select *from ongkir");
									while ($ongkir=$ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $ongkir["id_ongkir"] ?>">
									|| <?php echo $ongkir['nama_kota'] ?> ||
									Rp. <?php echo 	number_format($ongkir['tarif']) ?> ||
								</option>
							<?php 	} ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat Pengiriman</label>
					<textarea class="form-control" name="alamat_lengkap" placeholder="Masukkan Alamat Lengkap" ></textarea>
				</div>	
			<button class="btn btn-primary" name="checkout">Lanjutkan Pembayaran</button>
			</form>
				<?php 
				if (isset($_POST["checkout"])) {
					$alamat=$_POST["alamat_lengkap"];
					$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
					$nama=$_SESSION["pelanggan"]["nama_lengkap_pelanggan"];
					$id_ongkir=$_POST["id_ongkir"];
					$ambil=$koneksi->query("select * from ongkir where id_ongkir='$id_ongkir'");
					$ongkir=$ambil->fetch_assoc();
					$tarif=$ongkir['tarif'];
					$id_produk=$_SESSION["keranjang"]["id_produk"];
					$jumlah=$_SESSION["keranjang"]["jumlah_artikel"];
					$tanggal=date("Y-m-d");
					
					$koneksi->query("insert into pembelian_produk (id_pelanggan,total_harga) values('$id_pelanggan','$totalbelanja')");
					$id_baru=$koneksi->insert_id;
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
						# code...
					
					$koneksi->query("insert into transaksi (id_pembelian,id_pelanggan,nama_pelanggan,id_produk,id_ongkir,harga_produk,jumlah_beli,harga_total,harga_ongkir,alamat,total_pembayaran,tanggal_transaksi)
						values('$id_baru','$id_pelanggan','$nama','$id_produk','$id_ongkir','$harga','$jumlah','$harga_total','$tarif','$alamat','$totalbelanja','$tanggal')");

					// update stock
					$koneksi->query("update produk set stock=stock - $jumlah where id_produk='$id_produk'");
				}
					//mengkosongkan keranjang belanja
					unset($_SESSION["keranjang"]);
					//dialihkan ke nota karena sudah melakukan checkout
					echo "<script>alert('Pembelian Sukses');</script>";
					echo "<script>window.location='nota.php?id=$id_baru';</script>";
					} ?>

				
	</section>
	</body>
</html>