<?php 
include 'koneksi.php';
session_start();
 ?>
<html>
<head>

<title>beranda</title>
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../Font-Awesome/css/all.min.css">
</head>

<body background = "background.jpg">
<?php
include 'navbar.php';
?>

<div class="container">
<div class="row">
  <?php 
          $ambil=$koneksi->query("select*from produk");
        ?>
        <?php
          while ($artikel=$ambil->fetch_assoc()){;
        ?>
<div class="col-md-3">
<div class="card">
  <img src="../Foto/<?php echo $artikel['foto'];?>" width="10" height="130" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title-m1"><?php echo $artikel['nama_produk'] ?></h5>
    <p class="card-text-m1"><?php echo $artikel['detail'] ?></p>
  <p style="color: orange">
  <i class="fas fa-star"></i>
  <i class="fas fa-star"></i>
  <i class="fas fa-star"></i>
  <i class="fas fa-star-half-alt"></i>
  <i class="far fa-star"></i>
  </p>
    <a href="beli.php?id=<?php echo $artikel['id_produk'];?>" class="btn btn-primary">Rp <?php echo number_format($artikel['harga_produk']) ?></a>
    <a href="beli.php?id=<?php echo $artikel['id_produk'];?>" class="btn btn-success">Beli</a>
  </div>
</div>
</div>
<?php } ?>
</div>
</body>
</html>