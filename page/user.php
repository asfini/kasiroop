<div class="container">
    <div class="col-lg-12">
        <h4 align="center">User</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input User
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_user.php?aksi=simpan" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>User ID</td>
                                    <td><input type="text" name="UserID" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="Username" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="Password" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="Email" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td><input type="text" name="NamaLengkap" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="Alamat" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td>
                                        <select name="Level" class="form-control">
                                        <option selected>Pilih Level</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Petugas">Petugas</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        Data User
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID User</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.user.php";
                            $user = new User();
                            $select = $user->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['UserID'] ?> </td>
                                        <td> <?php echo $data['Username'] ?> </td>
                                        <td> <?php echo $data['Level'] ?> </td>
                                        <td>
                                            <a href="admin.php?page=edit_user&UserID=<?php echo $data['UserID'] ?>"> Edit </a> |
                                            <a href="proses/proses_user.php?UserID=<?php echo $data['UserID'] ?>&aksi=hapus"> Hapus </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>