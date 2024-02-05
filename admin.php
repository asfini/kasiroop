
<?php 
// file ini berfungsi untuk memanggil sesi user yang login
    session_start();

// memanggil file function class.user.php
    include_once 'function/class.user.php';
// membuat obejct user
    $user = new User();

// menampung session user yang login
    $UserID = $_SESSION['UserID'];
    $Level = $_SESSION['Level'];

// pengecekan jika yang login bukan Administrator maka akan diarahkan ke halaman login (index.php)
    if ($Level != "Administrator") {
        header("location:index.php");
    }
// pengecekan jika tidak ada session user yang login maka akan diarahkan ke halaman login (index.php)
    if (!$user->get_session()) {
        header("location:index.php");
    }
// jika dilakuka logout maka akan diarahkan ke halaman login (index.php)
    if (isset($_GET['logout'])) {
        $user->logout();
        header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrator</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <center>
        <div class="jumbotron">
            <h1 class="display-4">Aplikasi Kasir</h1>
            <h6> <?php echo $Level?> </h6>
        </div>
    </center>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="admin.php" class="btn btn-primary mx-2">Home</a>
        <a href="admin.php?page=user" class="btn btn-primary mx-2">User</a>
        <a href="admin.php?page=produk" class="btn btn-primary mx-2">Produk</a>
        <a href="admin.php?page=pelanggan" class="btn btn-primary mx-2">Pelanggan</a>
        <a href="admin.php?page=penjualan" class="btn btn-primary mx-2">Penjualan</a>    
        <a href="admin.php?logout=logout" class="btn btn-danger ml-auto">Logout</a>
    </nav>

<center>
    <div>
        <?php 
        if (isset($_GET['page'])) {
            //tampung di variabel page
            $page = $_GET['page'];
            switch ($page) {
                case 'produk':
                    include 'page/produk.php';
                    break;
                case 'edit_produk':
                    include 'page/edit_produk.php';
                    break;
                case 'user':
                    include 'page/user.php';
                    break;
                case 'edit_user':
                    include 'page/edit_user.php';
                    break;
                case 'pelanggan':
                    include 'page/pelanggan.php';
                    break;
                case 'edit_pelanggan':
                    include 'page/edit_pelanggan.php';
                    break;
                case 'penjualan':
                    include 'page/penjualan.php';
                    break;
                case 'penjualan_detail':
                    include 'page/penjualan_detail.php';
                    break;
                case 'laporan':
                    include 'page/laporan.php';
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        ?>
    </div>
</center>
    
</body>
</html>