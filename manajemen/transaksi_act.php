<?php
include '../koneksi.php';
session_start();

//menghilangkan Rp pada nominal
$bayar = preg_replace('/\D/', '', $_POST['bayar']);
// print_r(preg_replace('/\D/', '', $_POST['total']));

// print_r($_SESSION['cart']) ;
date_default_timezone_set('Asia/Jakarta');
$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$nama = $_SESSION['nama'];
$kembali = $bayar - $total;

// query  update stok barang



// batas query update stok barang
//insert ke tabel transaksi
mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi,tanggal_waktu,nomor,total,nama,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor','$total','$nama','$bayar','$kembali')");

// query  update stok barang



// batas query update stok barang

//mendapatkan id transaksi baru
$id_transaksi = mysqli_insert_id($koneksi);

//insert ke detail transaksi
foreach ($_SESSION['cart'] as $key => $value) {

	$id_barang = $value['id_barang'];
	$harga = $value['harga_barang'];
	$qty = $value['qty'];
	$tot = $harga*$qty;
	$disk = $value['diskon'];

	mysqli_query($koneksi,"INSERT INTO transaksi_detail (id_transaksi_detail,id_transaksi,id_barang,harga,qty,total,diskon) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$tot','$disk')");
	
	// query update stok
	$stoks = mysqli_query($koneksi,"select * from barang where id_barang = '$id_barang'");
	$r = mysqli_fetch_assoc($stoks);
	$stoksekarang = $r['stok'];
	$total = $stoksekarang-$qty;
	mysqli_query($koneksi,"update barang set stok='$total' where id_barang = '$id_barang'");
	// $sum += $value['harga']*$value['qty'];

	// batas update stok
}

$_SESSION['cart'] = [];

//redirect ke halaman transaksi selesai
header("location:transaksi_selesai.php?idtrx=".$id_transaksi);



?>