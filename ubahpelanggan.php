
<h2>Ubah Artikel</h2>

<?php 
$ambil=$koneksi->query("Select *from pelanggan where id_pelanggan='$_GET[id];'");
$pecah=$ambil->fetch_assoc();


echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="user" value="<?php echo $pecah['username_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="pass" value="<?php echo $pecah['password_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_lengkap_pelanggan'] ?>">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan'] ?>">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat_pelanggan'] ?>">
	</div>

	<div class="form-group">
		<label>No Hp</label>
		<input type="text" class="form-control" name="no" value="<?php echo $pecah['no_hp_pelanggan'] ?>">
	</div>
	
	<div>
		<button class="btn btn-primary" name="save">Simpan</button>	
	</div>

</form>


<?php
if (isset($_POST['save'])) 
{
			$koneksi->query("Update pelanggan set username_pelanggan='$_POST[user]',password_pelanggan='$_POST[pass]',nama_lengkap_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',alamat_pelanggan='$_POST[alamat]',no_hp_pelanggan='$_POST[no]' where id_pelanggan='$_GET[id]'");

	echo "<script>
                alert('Data Berhasil di Ubah. . .')
                window.location='index.php?page=pelanggan';
         </script>";
}?>