<?php 
session_start();
include_once '../function/class.user.php';

$user = new User();

$aksi = $_GET['aksi'];

if($aksi == 'simpan')
{
    $user->input(
        $_POST['UserID'],
        $_POST['Username'],
        $_POST['Password'],
        $_POST['Email'],
        $_POST['NamaLengkap'],
        $_POST['Alamat'],
        $_POST['Level']
    );
    header("location:../");
}

?>