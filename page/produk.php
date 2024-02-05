
<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Produk</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Produk
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_produk.php?aksi=simpan" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>Produk ID</td>
                                    <td><input type="text" name="ProdukID" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td><input type="text" name="NamaProduk" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><input type="text" name="Harga" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="text" name="Stok" class="form-control"></td>
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
                        Data Produk
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Produk</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.produk.php";
                            $Produk = new Produk();
                            $select = $Produk->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['ProdukID'] ?> </td>
                                        <td> <?php echo $data['NamaProduk'] ?> </td>
                                        <td> <?php echo $data['Harga'] ?> </td>
                                        <td> <?php echo $data['Stok'] ?> </td>
                                        <td>
                                            <a href="admin.php?page=edit_produk&ProdukID=<?php echo $data['ProdukID'] ?>"> Edit </a> |
                                            <a href="proses/proses_produk.php?ProdukID=<?php echo $data['ProdukID'] ?>&aksi=hapus"> Hapus </a>
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