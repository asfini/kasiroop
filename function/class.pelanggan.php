<?php 
include_once 'config.php';

class Pelanggan
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->return_db();
    }

    public function input($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon)
    {
        $query =  $this->db->prepare("INSERT INTO Pelanggan VALUES('$PelangganID', '$NamaPelanggan', '$Alamat', '$NomorTelepon')");
        $query->execute();
        return true;
    }

    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM Pelanggan");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function get_idPelanggan($PelangganID)
    {
        $query = $this->db->prepare("SELECT * FROM Pelanggan WHERE PelangganID='$PelangganID'");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function update($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon)
    {
        $query = $this->db->prepare("UPDATE Pelanggan SET NamaPelanggan='$NamaPelanggan', Alamat='$Alamat', NomorTelepon='$NomorTelepon' WHERE PelangganID = '$PelangganID'");
        $query->execute();
        return true;
    }

    public function hapus($PelangganID)
    {
        $query = $this->db->prepare("DELETE FROM Pelanggan WHERE PelangganID = '$PelangganID'");
        $query->execute();
        return true;
    }  

}

?>