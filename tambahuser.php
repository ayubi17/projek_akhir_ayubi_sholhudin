<h2>Tambah Artikel</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="user">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="pass">
	</div>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" name="alamat">
	</div>

	<div class="form-group">
		<label>Nomor Hp</label>
		<input type="text" class="form-control" name="hp">
	</div>

	<div>
		<button class="btn btn-primary" name="save">Simpan</button>	
	</div>

</form>

<?php
if (isset($_POST['save'])) 
{

$koneksi->query("insert into pelanggan(username_pelanggan,password_pelanggan,nama_lengkap_pelanggan,email_pelanggan,alamat_pelanggan,no_hp_pelanggan)
	values('$_POST[user]','$_POST[pass]','$_POST[nama]','$_POST[email]','$_POST[alamat]','$_POST[hp]')");
echo "<script>
                alert('Data Berhasil di Tambah. . .')
                window.location='index.php?page=pelanggan';
            </script>";}
?>
