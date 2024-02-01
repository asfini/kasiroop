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
                        <form action="proses/proses_pelanggan.php?aksi=update" method="POST">
                            <?php 
                            include_once "function/class.pelanggan.php";
                            $pelanggan = new Pelanggan();
                            foreach ($pelanggan->get_idpelanggan($_GET['PelangganID']) as $data) {
                            ?> 
                            <table class="table table-hover">
                                <tr>
                                    <td>Pelanggan ID</td>
                                    <td><input type="text" name="PelangganID" value="<?php echo $data['PelangganID'] ?>" class="form-control" readonly ></td>
                                </tr>
                                <tr>
                                    <td>Nama Pelanggan</td>
                                    <td><input type="text" name="NamaPelanggan" value="<?php echo $data['NamaPelanggan'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="Alamat" value="<?php echo $data['Alamat'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input type="text" name="NomorTelepon" value="<?php echo $data['NomorTelepon'] ?>" class="form-control"></td>
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