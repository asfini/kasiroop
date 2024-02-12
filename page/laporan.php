<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Produk</h4>
        <br>
        <div class="row">            
            <div class="col-sm-8">
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
                            $select = $laporan->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
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