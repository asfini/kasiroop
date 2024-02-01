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
                        <form action="proses/proses_user.php?aksi=update" method="POST">
                            <?php 
                            include_once "function/class.user.php";
                            $User = new User();
                            foreach ($User->get_iduser($_GET['UserID']) as $data) {
                            ?> 
                            <table class="table table-hover">
                                <table class="table table-hover">
                                <tr>
                                    <td>User ID</td>
                                    <td><input type="text" name="UserID" value="<?php echo $data['UserID'] ?>" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="Username" value="<?php echo $data['Username'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="Password" value="<?php echo $data['Password'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="Email" value="<?php echo $data['Email'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td><input type="text" name="NamaLengkap" value="<?php echo $data['NamaLengkap'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="Alamat" value="<?php echo $data['NamaLengkap'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td>
                                        <select name="Level" class="form-control">
                                        <option selected>Pilih Level</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>