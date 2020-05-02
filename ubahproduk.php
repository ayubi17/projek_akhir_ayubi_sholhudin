
<h2>Ubah Artikel</h2>

<?php 
$ambil=$koneksi->query("Select *from produk where id_produk='$_GET[id];'");
$pecah=$ambil->fetch_assoc();


echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Brand</label>
		<input type="text" class="form-control" name="stock" value="<?php echo $pecah['stock'] ?>">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'] ?>">
	</div>

	<div class="form-group">
		<label>Size</label>
		<input type="text" class="form-control" name="detail" value="<?php echo $pecah['detail'] ?>">
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" value="<?php echo $pecah['foto'] ?>">
	</div>
	<div>
		<button class="btn btn-primary" name="save">Simpan</button>	
	</div>

</form>


<?php
if (isset($_POST['save'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];

	//jika foto diubah
	if (!empty($lokasifoto)) {
		# code...
		move_uploaded_file($lokasifoto, "../Foto/$namafoto");

		$koneksi->query("Update produk set nama_produk='$_POST[nama]',stock='$_POST[stock]',harga_produk='$_POST[harga]'
			,detail='$_POST[detail]',foto='$namafoto' where id_produk='$_GET[id]'");

	}

	else{
			$koneksi->query("Update produk set nama_produk='$_POST[nama]',stock='$_POST[stock]',harga_produk='$_POST[harga]'
			,detail='$_POST[detail]'where id_produk='$_GET[id]'");

	}
	echo "<script>
                alert('Data Berhasil di Ubah. . .')
                window.location='index.php?page=produk';
            </script>";}


?>