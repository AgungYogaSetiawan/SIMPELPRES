<?php 
class Database{

    private $host;
    private $nama_database;
    private $username;
    private $password;
    public $connection;

    function __construct(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->nama_database = "simpelkpm_db";
    }

    public function getConnection(){
        $this->connection = null;
        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nama_database, 
                $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error pada koneksi ;" . $e->getMessage();
        }
        return $this->connection;
    }
}