<h2>Data Pembayaran</h2>
<?php 
include 'koneksi.php';
//mendapatkan id pembelian dari url
$id_pembelian=$_GET['id'];

//mengambil data pembayran berdasarkan idpembelian
$ambil=$koneksi->query("select *from pembayaran where id_pembelian='$id_pembelian'");
$detail=$ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama Pelanggan</th>
				<th><?php echo $detail['nama']; ?></th>
			</tr>
			<tr>
				<th>Bank</th>
				<th><?php echo $detail['bank'] ?></th>
			</tr>
			<tr>
				<th>Jumlah</th>
				<th>Rp. <?php echo number_format($detail['total']) ?></th>
			</tr>
			<tr>
				<th>Tanggal</th>
				<th><?php echo $detail['tanggal'] ?></th>
			</tr>
		</table>
		<div class="col-md-6">
			<img src="../Bukti/<?php echo $detail['bukti'] ?> " class="img-responsive">
		</div>
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>Nomor Resi</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="lunas">Sudah Dibayar</option>
			<option value="dikirim">Barang Sedang Dikirim</option>
			<option value="cancel">Cancel</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>


<?php  
	if (isset($_POST["proses"])) 
	{
		$resi=$_POST["resi"];
		$status=$_POST["status"];
		$koneksi->query("update transaksi set resi='$resi', status='$status' where id_pembelian='$id_pembelian' ");
		echo "<script>alert('Data Sudah di Update');</script>";
		echo "<script>window.location='index.php?page=transaksi';</script>";
	}
?>