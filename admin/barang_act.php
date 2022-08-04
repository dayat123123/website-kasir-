<?php 
include '../koneksi.php';
$kode_barang  = $_POST['kode_barang'];
$nama_barang  = $_POST['nama_barang'];
$harga_barang  = $_POST['harga_barang'];
$stok  = $_POST['stok'];

mysqli_query($koneksi, "insert into barang values (NULL,'$kode_barang','$nama_barang','$harga_barang','$stok')");
header("location:barang.php");