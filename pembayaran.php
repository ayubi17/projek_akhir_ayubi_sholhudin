<?php 
include 'koneksi.php';
session_start();
if (!isset($_SESSION["pelanggan"])or empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Harus Log In terlebih dahulu . . .');</script>";
	echo "<script>window.location='login.php';</script>";
	exit();
}
//mendapatakan id transaksi dari url 
$id_transaksi=$_GET["id"];
$ambil=$koneksi->query("select *from transaksi where id_transaksi='$id_transaksi'");
$detail_transaksi=$ambil->fetch_assoc();
$id_pembelian=$detail_transaksi["id_pembelian"];
//mendapatkan id pelanggan dari url
$id_pelanggan=$detail_transaksi["id_pelanggan"];
//mendapatkan id pelanggan yang log in 
$id_pelanggan_login=$_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan !== $id_pelanggan_login) {
echo "<script>alert('Terjadi Kesalahan');</script>";
	echo "<script>window.location='riwayat.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
		<?php 	include'navbar.php'; ?>
		<div class="container">
			<h2>Konfirmasi Pembayaran</h2>
			<p>Kirim bukti pembayaran anda disini</p>
			<div class="alert alert-info">Total Yang Harus Dibayar <strong>	Rp.<?php echo number_format($detail_transaksi["total_pembayaran"])  ?></strong>	</div>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank">
				</div>
				<div class="form-group">
					<label>Total Transaksi</label>
					<input type="number" class="form-control" name="total" min="1">
				</div>
				<div class="form-group">
					<label>Foto Bukti</label>
					<input type="file" class="form-control" name="bukti">
					<p class="text-danger">Foto Bukti Harus JPG Maksimal 2MB</p>
				</div>
				<div>	
					<button class="btn btn-primary" name="kirim">Kirim</button>
				</div>
			</form>
		</div>	
		<?php 	
			if (isset($_POST["kirim"])) 
			{
			//upload file bukti
				$buktii=$_FILES["bukti"]["name"];
				$lokasi_bukti=$_FILES["bukti"]["tmp_name"];
				$fix=date("Y-m-d-His").$buktii;
				move_uploaded_file($lokasi_bukti, "../Bukti/$fix");
				$nama=$_POST["nama"];
				$bank=$_POST["bank"];
				$jumlah=$_POST["total"];
				$tanggal=date("Y-m-d");
				//setelah melakukan pembayaran
				$koneksi->query("insert into pembayaran(id_pembelian,nama,bank,total,tanggal,bukti)
					values('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$fix')");
				//data yang berstatus pending di table transaksi di ubah
				$koneksi->query("update transaksi set status='Menunggu' where id_transaksi='$id_transaksi'");
				echo "<script>alert('Pembayaran Sukses ');</script>";
				echo "<script>window.location='riwayat.php';</script>";

			}
		?>
</body>
</html>