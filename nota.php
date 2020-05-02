<?php
session_start();
include 'koneksi.php';
// jika tidak ada session login, maka ditujukan ke login
if (!isset($_SESSION["pelanggan"])) {
	# code...
	echo "<script>alert('Silahkan Log In');</script>";
	echo "<script>window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>	Detail Pembelian</title>
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include'navbar.php'; ?>
<section class="konten">	
<div class="container">
<h2>Detail Pembelian</h2>
<?php
$ambil =$koneksi->query("select *from transaksi join pelanggan on transaksi.id_pelanggan=pelanggan.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
$detail= $ambil->fetch_assoc();
?>
<!--Jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain!-->
<!--Pelanggan yang beli harus pelanggan yang log in !-->
<?php 	
//mendapatkan id yg beli
$idpelangganygbeli=$detail["id_pelanggan"];
//mendapatkan id yg login
$idpelangganlogin=$_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganygbeli!==$idpelangganlogin) 
{
	echo "<script>alert('Terjadi Kesalahan')</script>";
	echo "<script>window.location='riwayat.php';</script>";
	exit();
}
 ?>

 <?php 	 
$ambil=$koneksi->query("select *from transaksi join produk on transaksi.id_produk=produk.id_produk where transaksi.id_pembelian='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

		<div class="row">	
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong><?php echo $detail['nama_lengkap_pelanggan']; ?></strong>
					<p>Username : <?php echo 	$detail['username_pelanggan']; ?></p>
					<p>Email    : <?php echo 	$detail['email_pelanggan']; ?></p>
					<p>Nomor Hp : <?php echo 	$detail['no_hp_pelanggan']; ?></p>
				</div>
				<div class="col-md-4">
					<h3>Pengiriman</h3>
					<strong><?php echo $detail['alamat_pelanggan']; ?></strong>
					<p>Ongkos Kirim  :<?php echo 	number_format($detail['harga_ongkir']); ?></p>
					<p>Detail Alamat :<?php echo 	$pecah['alamat']; ?></p>
				</div>
				<div class="col-md-4">
					<h3>Bayar</h3>
					<strong>	Nomor Pembelian : <?php echo 	$pecah['id_transaksi']; ?></p></strong>
					<strong>Rp.<?php echo number_format($pecah["total_pembayaran"]); ?></strong>
				</div>
		</div>
		<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>ID Transaksi</th>
			<th>Nama Pelanggan</th>
			<th>Nama Produk</th>
			<th>Jumlah Pembelian</th>
			<th>Tanggal Transaksi</th>
			<th>Total Transaksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("select *from transaksi join produk on transaksi.id_produk=produk.id_produk where transaksi.id_pembelian='$_GET[id]'"); 
			?>
			<?php while ($bagi=$ambil->fetch_assoc()) {
				# code...
			?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $bagi["id_transaksi"]; ?></td>
			<td><?php echo 	$bagi["nama_pelanggan"]; ?></td>
			<td><?php echo 	$bagi["nama_produk"] ?></td>
			<td><?php echo 	$bagi["jumlah_beli"] ?></td>
			<td><?php 	echo $bagi["tanggal_transaksi"]; ?></td>
			<td>Rp.<?php 	echo number_format($bagi["total_pembayaran"]); ?></td>
		</tr>
			<?php $nomor++ ?>
		<?php } ?>
	</tbody>
</table>
		<div class="row">	
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>
							Silahkan Melakukan Pembayaran Sebesar Rp. <?php echo number_format($pecah['total_pembayaran']);?> Ke <br>
							<strong>BANK BCA 137-0011088-3267 AN. AYUBI</strong>
						</p>
					</div>
				</div>
		</div>
</div>
</section>
</body>
</html>