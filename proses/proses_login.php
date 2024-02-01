<?php 
session_start();
include '../function/class.user.php';

$user = new User();

$aksi = $_GET['aksi'];
if($aksi == 'login')
{
    $login = $user->cek_login($_POST['Username'],$_POST['Password']);
    if($login)
    {
        return true;
    }else{
        echo 'Username dan Password Salah';
        header("location:../index.php");
    }
}
?>