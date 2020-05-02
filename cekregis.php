<?php
include 'koneksi.php';

$user = $_POST['user'];
$pass = $_POST['pass'];
$email= $_POST['email'];
$almt= $_POST['adress'];
$hp= $_POST['contact'];
$name=$_POST['name'];
$query = mysqli_query($koneksi,"insert into pelanggan(username_pelanggan,password_pelanggan,nama_lengkap_pelanggan,email_pelanggan,alamat_pelanggan,no_hp_pelanggan)
                               values('$user','$pass','$name','$email','$almt','$hp')");

if($query)
{
    echo '<script>
    alert("create Account Succsess!");
    location.href = "form_login.php";
    </script>';
}else{
    echo '<script>
    alert("Create Account failed!");
    location.href = "form_regis.php";
    </script>';
}