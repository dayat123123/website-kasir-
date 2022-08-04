<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$user_username  = $_POST['user_username'];
$user_password  = md5($_POST['user_password']);
mysqli_query($koneksi, "insert into users values (NULL,'$nama','$user_username','$user_password','kasir', '')");
header("location:user.php");