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
                        <form action="proses/proses_produk.php?aksi=update" method="POST">
                            <?php 
                            include_once "function/class.produk.php";
                            $produk = new Produk();
                            foreach ($produk->get_idproduk($_GET['ProdukID']) as $data) {
                            ?> 
                            <table class="table table-hover">
                                <tr>
                                    <td>Produk ID</td>
                                    <td><input type="text" name="ProdukID" value="<?php echo $data['ProdukID'] ?>" class="form-control" readonly ></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td><input type="text" name="NamaProduk" value="<?php echo $data['NamaProduk'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><input type="text" name="Harga" value="<?php echo $data['Harga'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="text" name="Stok" value="<?php echo $data['Stok'] ?>" class="form-control"></td>
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