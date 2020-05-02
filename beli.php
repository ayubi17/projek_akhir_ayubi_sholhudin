<?php
session_start();
//mendapatkan id produk dari url 
$id_produk=$_GET['id'];
//jika sudah ada produk dikeranjang, maka produk itu jumlahnya +1
if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu belum ada dikeranjang, maka produk dianggap beli 1
else{
	$_SESSION['keranjang'][$id_produk]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//menuju ke halaman keranjang
echo "<script>alert('Item Telah di Tambahkan ke Keranjang'); </script>";
echo "<script>window.location='keranjang.php';</script>";

?>