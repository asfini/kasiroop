<?php 
include_once 'config.php';

class Produk
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->return_db();
    }

    public function input($ProdukID, $NamaProduk, $Harga, $Stok)
    {
        $query =  $this->db->prepare("INSERT INTO produk VALUES('$ProdukID', '$NamaProduk', '$Harga', '$Stok')");
        $query->execute();
        return true;
    }

    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM produk");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function get_idproduk($ProdukID)
    {
        $query = $this->db->prepare("SELECT * FROM produk WHERE ProdukID='$ProdukID'");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function update($ProdukID, $NamaProduk, $Harga, $Stok)
    {
        $query = $this->db->prepare("UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' WHERE ProdukID = '$ProdukID'");
        $query->execute();
        return true;
    }

    public function hapus($ProdukID)
    {
        $query = $this->db->prepare("DELETE FROM produk WHERE ProdukID = '$ProdukID'");
        $query->execute();
        return true;
    }  

}

?>