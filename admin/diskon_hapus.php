<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from disbarang where id='$id'");
header("location:diskon.php");