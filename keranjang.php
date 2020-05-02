<?php
session_start();

include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	# code...
	echo "<script>alert('Keranjang Kosong, Silahkan Belanja');</script>";
	echo "<script>window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fading Store | KeranjangS</title>
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
	
	<?php include'navbar.php'; ?>
	<section class="konten">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Item</th>
						<th>Harga</th>
						<th>Jumlah Beli</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1;?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<?php
					$ambil=$koneksi->query("select *from produk where id_produk='$id_produk'");
					$pecah=$ambil->fetch_assoc();
					//echo "<pre>";
					//print_r($pecah);
					//echo "</pre>";
					?>
					<tr>
						<td><?php echo $nomor;?>.</td>
						<td><?php echo $pecah['nama_produk'];?></td>
						<td>Rp.<?php echo number_format($pecah['harga_produk']);?></td>
						<td><?php echo $jumlah?></td>
						
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>
					</tr>
					<?php $nomor++;?>
					<?php endforeach?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default" name="lanjut">Lanjutkan Belanja</a>
			<a href="bayar.php" class="btn btn-primary">Lanjut Ke Pembayaran</a>

			
		</div>
	</section>
	
</body>
</html>