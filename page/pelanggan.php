<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Pelanggan</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Pelanggan
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_pelanggan.php?aksi=simpan" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>Pelanggan ID</td>
                                    <td><input type="text" name="PelangganID" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama Pelanggan</td>
                                    <td><input type="text" name="NamaPelanggan" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="Alamat" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input type="text" name="NomorTelepon" class="form-control"></td>
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
                        Data Pelanggan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Pelanggan</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.pelanggan.php";
                            $pelanggan = new Pelanggan();
                            $no = 1;
                            $select = $pelanggan->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['PelangganID'] ?> </td>
                                        <td> <?php echo $data['NamaPelanggan'] ?> </td>
                                        <td> <?php echo $data['Alamat'] ?> </td>
                                        <td> <?php echo $data['NomorTelepon'] ?> </td>
                                        <td>
                                            <a href="admin.php?page=edit_pelanggan&PelangganID=<?php echo $data['PelangganID'] ?>"> Edit </a> |
                                            <a href="proses/proses_pelanggan.php?PelangganID=<?php echo $data['PelangganID'] ?>&aksi=hapus"> Hapus </a>
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