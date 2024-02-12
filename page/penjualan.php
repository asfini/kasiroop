<?php 
include_once "function/class.penjualan.php";
// error_reporting(0);
$penjualan = new Penjualan();

if (isset($_POST['btnProduk'])) {
    $penjualan->input_produk(
        null,
        $_POST['PenjualanID'],
        $_POST['ProdukID'],
        $_POST['JumlahProduk']
    );
}
?>

<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Penjualan</h4>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header">
                            Produk
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <td>Produk ID</td>
                                    <td>
                                        <select name="ProdukID" class="form-control">
                                            <?php
                                            require_once "function/class.produk.php";
                                            $produk = new Produk;
                                            $select = $produk->tampil();
                                            foreach ($select as $data) {
                                                echo "<option value =$data[ProdukID]> $data[ProdukID] - $data[NamaProduk] </option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min=1 name="JumlahProduk" id="JumlahProduk" class="form-control">
                                    </td>
                                    <td>
                                        <input type="submit" name="btnProduk" value="Input" class="btn btn-primary">
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Produk Id</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Subtotal</th>                                    
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "function/class.penjualan.php";
                                $penjualan = new penjualan();
                                $select = $penjualan->tampil_detail_produk();
                                foreach ($select as $data) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td> 
                                                <input type="text" class="form-control" readonly name="ProdukIDx[<?php echo $data['ProdukID'] ?>]" value="<?php echo $data['ProdukID'] ?>">
                                            </td>
                                            <td> 
                                                <input type="text" class="form-control" readonly name="NamaProdukx[<?php echo $data['NamaProduk'] ?>]" value="<?php echo $data['NamaProduk'] ?>">
                                            </td>
                                            <td> 
                                                <input type="text" class="form-control" readonly name="JumlahProdukx[<?php echo $data['JumlahProduk'] ?>]" value="<?php echo $data['JumlahProduk'] ?>">
                                            </td>
                                            <td> 
                                                <input type="text" class="form-control" readonly name="Hargax[<?php echo $data['Harga'] ?>]" value="<?php echo $data['Harga'] ?>">
                                            </td>
                                            <td> 
                                                <input type="text" class="form-control" readonly name="Subtotalx[<?php echo $data['Subtotal'] ?>]" value="<?php echo $data['Subtotal'] ?>">
                                            </td>
                                            <td>
                                                <a href="proses/proses_penjualan.php?ProdukID=<?php echo $data['ProdukID'] ?>&aksi=hapus" class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header">
                            Input penjualan
                        </div>
                        <div class="card-body">
                                <table class="table table-hover">
                                    <tr>
                                        <td>Penjualan ID</td>
                                        <td><input type="text" name="PenjualanID" class="form-control"></td>
                                            
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td><input type="text" name="TanggalPenjualan" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td><input type="text" name="TotalHarga" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Pelanggan</td>
                                        <td><select name="PelangganID" class="form-control">
                                            <?php
                                            require_once "function/class.pelanggan.php";
                                            $pelanggan = new Pelanggan;
                                            $select = $pelanggan->tampil();
                                            foreach ($select as $data) {
                                                echo "<option value =$data[PelangganID]> $data[PelangganID] - $data[NamaPelanggan] </option>";
                                            }
                                            ?>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>