<?php
class Model
{
    protected $mysqli;

    public function __construct()
    {
        $dbhostname = 'localhost';    
        $dbusername = 'root';         
        $dbpassword = '';            
        $dbname = 'mbti';            

        // Membuat koneksi menggunakan MySQLi
        $this->mysqli = new mysqli($dbhostname, $dbusername, $dbpassword, $dbname);

        // Periksa apakah koneksi berhasil
        if ($this->mysqli->connect_error) {
            die("Database connection failed: " . $this->mysqli->connect_error);
        }
    }
}
?>
