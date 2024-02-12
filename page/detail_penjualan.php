
<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Produk</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Detail Penjualan
                    </div>
                    <div class="card-body">
                        <?php 
                            require_once "function/class.laporan.php";
                            $laporan = new Laporan();
                            $select = $laporan->getidpenjualan($_GET['PenjualanID']);
                            foreach ($select as $data) {
                            ?>
                            <table class="table table-hover">                                
                                <tr>
                                    <td>Penjualan ID</td>
                                    <td><?php echo $data['PenjualanID'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Penjualan</td>
                                    <td><?php echo $data['TanggalPenjualan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td><?php echo $data['TotalHarga'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pelanggan ID</td>
                                    <td><?php echo $data['PelangganID'] ?></td>
                                </tr>
                            </table>
                            <?php } ?>
                            <a href="admin.php?page=laporan" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        Data Produk
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Produk</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.laporan.php";
                            $laporan = new Laporan();
                            $select = $laporan->detail_tampil($_GET['PenjualanID']);
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['ProdukID'] ?> </td>
                                        <td> <?php echo $data['NamaProduk'] ?> </td>
                                        <td> <?php echo $data['Harga'] ?> </td>
                                        <td> <?php echo $data['JumlahProduk'] ?> </td>
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