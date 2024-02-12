<?php 
include_once 'config.php';

class Penjualan
{
    //buat variable untuk menyimpan koneksi db
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->return_db();
    }

    public function idauto()
    {
        $query = $this->db->prepare("SELECT MAX(PenjualanID) as terakhir FROM penjualan");
        $query->execute();
        $hasil = $query->get_result();
        $data   = $hasil->fetch_assoc();
        $lastID = $data['terakhir'];
        $nextID = $lastID + 1;
        return $nextID;
    }


    //menginput data paket yang akan dipilih
    // $query = $this->db->prepare("INSERT INTO detailpenjualan VALUES(null,'$PenjualanID','$ProdukID','$JumlahProduk',0)");

    public function input_produk($DetailID, $PenjualanID, $ProdukID, $JumlahProduk)
    {
        $query = $this->db->prepare("INSERT INTO detailpenjualan (DetailID, PenjualanID, ProdukID, JumlahProduk, Subtotal)
        SELECT null, ?, ?, ?, Produk.Harga * ? AS Subtotal 
        FROM produk 
        WHERE ProdukID = ?");
        $query->bind_param('iiiii', $PenjualanID, $ProdukID, $JumlahProduk, $JumlahProduk, $ProdukID);
    
    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
    }

    //menampilkan produk di keranjang
    public function tampil_detail_produk()
    {
        $query = $this->db->prepare("SELECT dp.ProdukID, p.NamaProduk, dp.JumlahProduk, p.Harga, dp.Subtotal 
        FROM detailpenjualan dp
        JOIN produk p ON dp.ProdukID = p.ProdukID
        WHERE dp.PenjualanID > (SELECT MAX(PenjualanID) FROM penjualan)");

        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;

    }

    //hapus produk di keranjang
    public function hapus_detail($ProdukID, $PenjualanID)
    {
        $query = $this->db->prepare("DELETE FROM detailpenjualan WHERE ProdukID = '$ProdukID' AND PenjualanID = '$PenjualanID'");
        $query->execute();
        return true;
    }

    //input penjualan
    public function input_penjualan($PenjualanID, $TanggalPenjualan, $TotalHarga, $PelangganID)
    {
        $query =  $this->db->prepare("INSERT INTO penjualan VALUES('$PenjualanID', '$TanggalPenjualan', '$TotalHarga', '$PelangganID')");

        $query->execute();
        return true;
    }
        
}