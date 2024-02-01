<?php 
session_start();
include '../function/class.user.php';

$user = new User();

$aksi = $_GET['aksi'];

if ($aksi == "simpan") {
    $user->input(
        $_POST['UserID'],
        $_POST['Username'],
        $_POST['Password'],
        $_POST['Email'],
        $_POST['NamaLengkap'],
        $_POST['Alamat'],
        $_POST['Level']
    );
    header("location:../admin.php?page=user");
}

if ($aksi == "update") {
    $user->update(
        $_POST['UserID'],
        $_POST['Username'],
        $_POST['Password'],
        $_POST['Email'],
        $_POST['NamaLengkap'],
        $_POST['Alamat'],
        $_POST['Level']
    );
    header("location:../admin.php?page=user");
}

if ($aksi == "hapus") {
    $user->hapus($_GET['UserID']);
    header("location:../admin.php?page=user");
}
?>