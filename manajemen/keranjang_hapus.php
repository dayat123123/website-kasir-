<?php 
include '../koneksi.php';
session_start();

$id = $_GET['id_barang'];

$cart = $_SESSION['cart'];
// print_r($cart);

//berfungsi untuk mengambil data secara spesifik
$k = array_filter($cart,function ($var) use ($id){
	return ($var['id_barang']==$id);
});
print_r($k);

foreach ($k as $key => $value) {
	unset($_SESSION['cart'][$key]);
}

//mengembalikan urutan data
$_SESSION['cart'] = array_values($_SESSION['cart']);

header('location:index.php');

?>