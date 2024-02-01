<?php 
session_start();
include '../function/class.produk.php';

$produk = new Produk();

$aksi = $_GET['aksi'];

if ($aksi == "simpan") {
    $produk->input(
        $_POST['ProdukID'],
        $_POST['NamaProduk'],
        $_POST['Harga'],
        $_POST['Stok']
    );
    header("location:../admin.php?page=produk");
}

if ($aksi == "update") {
    $produk->update(
        $_POST['ProdukID'],
        $_POST['NamaProduk'],
        $_POST['Harga'],
        $_POST['Stok']
    );
    header("location:../admin.php?page=produk");
}

if ($aksi == "hapus") {
    $produk->hapus($_GET['ProdukID']);
    header("location:../admin.php?page=produk");
}
?>