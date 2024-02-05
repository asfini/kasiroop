<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div clas="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_login.php?aksi=login" method="POST">
                            <div class="mb-3">
                                <label>Username : </label>
                                <input type="text" class="form-control" name="Username" placeholder="Masukkan Username">
                            </div>
                            <div class="mb-3">
                                <label>Password : </label>
                                <input type="password" class="form-control" name="Password" placeholder="Masukkan Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="register.php">Daftar Akun</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
    
</body>
</html>