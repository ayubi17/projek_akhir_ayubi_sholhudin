<?php 
session_start();
include 'koneksi.php';
//jika belum login 
if (!isset($_SESSION["pelanggan"])or empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Harus Log In terlebih dahulu . . .');</script>";
	echo "<script>window.location='login.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Pembelian</title>
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php include'navbar.php'; ?>
	<section class="riwayat">
		<div class="container">
			<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["username_pelanggan"]; ?></h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Transaksi</th>
						<th>ID Pembelian</th>
						<th>Total Pembayaran</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
					//mendapatkan id pelanggan dari pelangan yg login
					$id_pelanggan=$_SESSION["pelanggan"]['id_pelanggan'];

					$ambil=$koneksi->query("select *from transaksi where id_pelanggan='$id_pelanggan'");
					while($pecah=$ambil->fetch_assoc()){
					?>
					<tr>
						<td> <?php echo $nomor ?>.</td>
						<td><?php echo $pecah["id_transaksi"] ?></td>
						<td><?php echo $pecah["id_pembelian"] ?></td>
						<td>Rp.<?php echo 	number_format($pecah["total_pembayaran"]) ?></td>
						<td>
							<?php echo 	$pecah["status"] ?>
							<br>
							<?php  if (!empty($pecah['resi'])): ?>
							Resi <?php echo $pecah["resi"] ?>
							<?php endif ?>
						</td>
						<td>
							<a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">Nota</a>

							<?php if ($pecah['status']=="pending"): ?>
							
								<a href="pembayaran.php?id=<?php echo $pecah["id_transaksi"]; ?>" class="btn btn-success">InputPembayaran</a>
							<?php else: ?>
							
								
							<?php endif ?>
						</td>
					</tr>
					<?php $nomor++ ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>