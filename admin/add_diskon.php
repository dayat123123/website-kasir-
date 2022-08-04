

<?php 
include '../koneksi.php';
$barang_id = $_POST['barang_id'];
$qty = $_POST['qty'];
$potongan = $_POST['potongan'];

mysqli_query($koneksi, "INSERT INTO disbarang VALUES (NULL,'$barang_id','$qty','$potongan')");
header("location:diskon.php");