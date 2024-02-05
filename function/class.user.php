<?php 
include 'config.php';

class User
{
    //buat variable untuk menyimpan koneksi db
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->return_db();
    }

    //function login
    public function cek_login($Username, $Password)
    {
        $query = "SELECT * FROM user WHERE Username='$Username' AND Password = '$Password'";
        $hasil = $this->db->query($query);
        $data = $hasil->fetch_assoc();
        if($data >= 1)
        {
            if($data['Level'] == "Administrator")
            {
                $_SESSION['login'] = true;
                $_SESSION['UserID'] = $data['UserID'];
                $_SESSION['Level'] = $data['Level'];
                header("location:../admin.php");
                return true;
            }
            if ($data['Level'] == "Petugas") 
            {
                $_SESSION['login'] = true;
                $_SESSION['UserID'] = $data['UserID'];
                $_SESSION['Level'] = $data['Level'];
                header("location:../petugas.php");
                return true;
            }
        }else{
            return false;
        }
        
    }

    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function logout()
    {
        $_SESSION['login'] = false;
        unset($_SESSION);
        session_destroy();
    }

    public function input($UserID, $Username, $Password, $Email, $NamaLengkap, $Alamat, $Level)
    {
        $query =  $this->db->prepare("INSERT INTO user VALUES('$UserID', '$Username', '$Password', '$Email','$NamaLengkap','$Alamat','$Level')");
        $query->execute();
        return true;
    }

    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function get_iduser($UserID)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE UserID='$UserID'");
        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;
    }

    public function update($UserID, $Username, $Password, $Email, $NamaLengkap, $Alamat, $Level)
    {
        $query = $this->db->prepare("UPDATE user SET Username='$Username', Password='$Password', Email='$Email', NamaLengkap='$NamaLengkap', Alamat='$Alamat', Level='$Level' WHERE UserID = '$UserID'");
        $query->execute();
        return true;
    }

    public function hapus($UserID)
    {
        $query = $this->db->prepare("DELETE FROM User WHERE UserID = '$UserID'");
        $query->execute();
        return true;
    }
}

?>