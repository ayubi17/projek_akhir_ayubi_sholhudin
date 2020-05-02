<h2>Hapus Artikel</h2>

<?php
$ambil=$koneksi ->query("Select *from pelanggan where id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


$koneksi->query("delete from pelanggan where id_pelanggan='$_GET[id]'");
echo "<script>
		alert('Data Telah di Hapus . . .');
		window.location='index.php?page=pelanggan';
</script>"
?>