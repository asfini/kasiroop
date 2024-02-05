<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div clas="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Daftar Akun
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_user.php?aksi=simpan" method="POST">
                            <div class="mb-3">
                                <label>UserID : </label>
                                <input type="text" class="form-control" name="UserID" placeholder="Masukkan UserID">
                            </div>
                            <div class="mb-3">
                                <label>Username : </label>
                                <input type="text" class="form-control" name="Username" placeholder="Masukkan Username">
                            </div>
                            <div class="mb-3">
                                <label>Password : </label>
                                <input type="password" class="form-control" name="Password" placeholder="Masukkan Password">
                            </div>
                            <div class="mb-3">
                                <label>Email : </label>
                                <input type="text" class="form-control" name="Email" placeholder="Masukkan Email">
                            </div>
                            <div class="mb-3">
                                <label>Nama Lengkap : </label>
                                <input type="text" class="form-control" name="NamaLengkap" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label>Alamat : </label>
                                <input type="text" class="form-control" name="Alamat" placeholder="Masukkan Alamat">
                            </div>
                            <div class="mb-3">
                                <label>Level : </label>
                                <select name="Level" class="form-control">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                            </div>                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                                <a href="index.php">Sudah Memiliki Akun?</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
    
</body>
</html>