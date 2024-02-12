<?php 
include_once "function/class.penjualan.php";
// error_reporting(0);
$penjualan = new Penjualan();

if (isset($_POST['btnProduk'])) 
{
    $penjualan->input_produk
    (
        null,
        $_POST['PenjualanID'],
        $_POST['ProdukID'],
        $_POST['JumlahProduk']
    );
}
else if(isset($_POST['btnPenjualan']))
{
    $penjualan->input_penjualan
    (
        $_POST['PenjualanID'],
        $_POST['TanggalPenjualan'],
        $_POST['TotalHarga'],
        $_POST['PelangganID']
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
                                $total = 0;
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
                                            <?php $total = $total + $data['Subtotal']?>                                            
                                            <td>
                                                <a href="proses/proses_penjualan.php?ProdukID=<?php echo $data['ProdukID'] ?>&PenjualanID=<?php echo $penjualan->idauto('nextID'); ?>&aksi=hapus" class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>

                                        <?php } ?>  

                                        <tr>
                                            <td colspan=4>Total Harga</td>
                                            <td colspan=2><input type="text" name="TotalHarga" value="<?php echo $total ?>" readonly class="form-control"></td>
                                        </tr>                                 
                                    </tbody>
                                
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
                                        <td><input type="text" name="PenjualanID" value="<?php echo $penjualan->idauto('nextID'); ?>" class="form-control" readonly></td>
                                            
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <?php $tgl = date('Y-m-d'); ?>
                                        <td><input type="text" name="TanggalPenjualan" value="<?php echo $tgl ?>" class="form-control" readonly></td>
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
                                        <td colspan="2" align="right">
                                        <input type="submit" name="btnPenjualan" value="Input" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //menghitung total = jumlah * harga
    function hitung() {
        var jumlah = document.getElementById('jumlah').value;
        var harga_barang = document.getElementById('harga_barang').value;
        var result = parseInt(jumlah) * parseInt(harga_barang);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>