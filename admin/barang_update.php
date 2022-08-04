<?php 
include '../koneksi.php';
$id  = $_POST['id_barang'];
$kode_barang  = $_POST['kode_barang'];
$nama_barang  = $_POST['nama_barang'];
$harga_barang  = $_POST['harga_barang'];
$stok  = $_POST['stok'];

mysqli_query($koneksi, "update barang set nama_barang='$nama_barang', harga_barang='$harga_barang', stok='$stok' where id_barang='$id'") or die(mysqli_error($koneksi));
header("location:barang.php");