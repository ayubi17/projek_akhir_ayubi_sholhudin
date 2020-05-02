<h2>Tambah Artikel</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Stock</label>
		<input type="text" class="form-control" name="stock">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="text" class="form-control" name="harga">
	</div>

	<div class="form-group">
		<label>Detail</label>
		<input type="text" class="form-control" name="detail">
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>

	<div>
		<button class="btn btn-primary" name="save">Simpan</button>	
	</div>

</form>

<?php
if (isset($_POST['save'])) 
{
$nama =$_FILES['foto']['name'];
$lokasi=$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../Foto/".$nama);

$koneksi->query("insert into produk(nama_produk,stock,harga_produk,detail,foto)
	values('$_POST[nama]','$_POST[stock]','$_POST[harga]','$_POST[detail]','$nama')");
echo "<script>
                alert('Data Berhasil di Tambah. . .')
                window.location='index.php?page=produk';
            </script>";}
?>
