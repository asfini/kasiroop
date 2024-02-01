<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Penjualan</h4>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Input Penjualan
                    </div>
                    <div class="card-body">                        
                            <form action="proses/proses_penjualan.php?aksi=simpan" method="POST">
                                <table class="table table-hover">    
                                    <div class="col-sm-6">                                    
                                        <tr>
                                            <td>Penjualan ID</td>
                                            <td><input type="text" name="PenjualanID" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Penjualan</td>
                                            <td><input type="text" name="TanggalPenjualan" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td><input type="text" name="TotalHarga" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Pelanggan ID</td>
                                            <td><input type="text" name="PelangganID" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                        </tr>
                                        </div>
                                </table>                                
                            </form>                        
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        Data Penjualan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Penjualan</th>
                                    <th scope="col">Nama Penjualan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.Penjualan.php";
                            $Penjualan = new Penjualan();
                            $select = $Penjualan->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['PenjualanID'] ?> </td>
                                        <td> <?php echo $data['NamaPenjualan'] ?> </td>
                                        <td> <?php echo $data['Harga'] ?> </td>
                                        <td> <?php echo $data['Stok'] ?> </td>
                                        <td>
                                            <a href="admin.php?page=edit_Penjualan&PenjualanID=<?php echo $data['PenjualanID'] ?>"> Edit </a> |
                                            <a href="proses/proses_Penjualan.php?PenjualanID=<?php echo $data['PenjualanID'] ?>&aksi=hapus"> Hapus </a>
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