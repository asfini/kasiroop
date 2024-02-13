<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Laporan</h4>

        <form action="" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                
                <div class="col-sm-4">
                    <input type="date" name="tanggal_awal" " class=" form-control">
                </div>
                <div class="col-sm-4">
                    <input type="date" name="tanggal_akhir" " class=" form-control">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="btnlaporan" class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>
        
        <br>
        <div class="row">            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Data Penjualan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Penjualan ID</th>
                                    <th scope="col">Tanggal Penjualan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Pelanggan ID</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.laporan.php";
                            $laporan = new Laporan();

                            if (isset($_POST["btnlaporan"])) {
                                $select = $laporan->tampil_tanggal($_POST['tanggal_awal'],$_POST['tanggal_akhir']);
                            }else{
                                $select = $laporan->tampil();                                
                            }
                            ?>
                                <tbody>
                                    <?php 
                                    foreach ($select as $data) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $data['PenjualanID'] ?> </td>
                                        <td> <?php echo $data['TanggalPenjualan'] ?> </td>
                                        <td> <?php echo $data['TotalHarga'] ?> </td>
                                        <td> <?php echo $data['PelangganID'] ?> </td>
                                        <td>
                                            <a href="admin.php?page=detail_penjualan&PenjualanID=<?php echo $data['PenjualanID'] ?>" class="btn btn-success"> Detail </a>
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