<h2>Hapus Artikel</h2>

<?php
$ambil=$koneksi ->query("Select *from produk where id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotoproduk=$pecah['foto'];

if (file_exists("../Foto/$fotoproduk"))
{
	unlink("../Foto/$fotoproduk");
}

$koneksi->query("delete from produk where id_produk='$_GET[id]'");
echo "<script>
		alert('Artikel Telah di Hapus . . .');
		window.location='index.php?page=produk';
</script>"
?>