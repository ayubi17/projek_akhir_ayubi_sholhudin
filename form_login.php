<?php
session_start();
include 'koneksi.php';
?>
<html>
<head>
<title>login</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="login">
		<form action="" method="post">
			<h1>Log In</h1>
				<div id="user" class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="username" placeholder="Username">
				</div>
				<div id="pw" class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" name="password" placeholder="Password">
				</div>
						<input type="submit" name="a" id="btn" value="Sign In">
						<a href="form_regis.php">Daftar</a>
</form><?php
//jika ada tombol login / tombol login ditekan
if (isset($_POST["a"])) 
{
//cek query table pelanggan
	$user=$_POST["username"];
	$pass=$_POST["password"];
	$select=$koneksi->query("select * from pelanggan where username_pelanggan='$user' AND password_pelanggan='$pass'");
//pilih yang akan diambil
	$valid=$select->num_rows;
//jika 1 akun valid maka login
	if ($valid==1) {
		# code...
		//dapat info dalam bentuk fetch array (akun yang diloginkan)
		$akun=$select->fetch_assoc();
		//simpan di session pelanggan
		$_SESSION["pelanggan"]=$akun;
		echo "<script>alert('LogIn Sukses, Selamat Datang di rumikan');</script>";
		//jika sudah belanja 
		if (isset($_SESSION["keranjang"])OR !empty($_SESSION["keranjang"])) 
		{
		echo "<script>window.location='bayar.php';</script>";
		}
		else{
			echo "<script>window.location='riwayat.php';</script>";
		}	
		}
	else{
		echo "<script>alert('Username Atau Password Salah');</script>";
		echo "<script>window.location='form_login.php';</script>";
	}
}

?>
</body>
</html>