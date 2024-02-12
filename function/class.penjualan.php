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
        $data = $query->fetch_assoc();
        $maxID = $data['terakhir'];

        // Jika tidak ada data dalam tabel
        if ($maxID == null) {
            return 1;
        } else {
            // Mengambil angka dari ID terakhir dan menambahkan 1
            $nextID = $maxID + 1;
            return $nextID;
        }
    }

    //menginput data paket yang akan dipilih
    public function input_produk($DetailID, $PenjualanID, $ProdukID, $JumlahProduk)
    {
        $query = $this->db->prepare("INSERT INTO detailpenjualan VALUES(null,'$PenjualanID','$ProdukID','$JumlahProduk')");
        $query->execute();
        return true;
    }

    //menampilkan produk di keranjang
    public function tampil_detail_produk()
    {
        $query = $this->db->prepare("SELECT detailpenjualan.ProdukID, produk.NamaProduk, detailpenjualan.JumlahProduk, produk.Harga,detailpenjualan.Subtotal FROM detailpenjualan, produk WHERE detailpenjualan.ProdukID = produk.ProdukID");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    //hapus produk di keranjang
    public function hapus_detail($ProdukID)
    {
        $query = $this->db->prepare("DELETE FROM detailpenjualan WHERE ProdukID = '$ProdukID'");
        $query->execute();
        return true;
    }
    
}