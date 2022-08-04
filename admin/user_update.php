<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$user_username  = $_POST['user_username'];
$user_password  = md5($_POST['user_password']);

mysqli_query($koneksi, "update users set nama='$nama', user_username='$user_username', user_password='$user_password' where id='$id'") or die(mysqli_error($koneksi));
header("location:user.php");