<?php
date_default_timezone_set('Asia/Kolkata');  
class Database{
  
    // specify your own database credentials
    
    private $host = "localhost";
    private $db_name = "pracharwall";
    private $username = "root";
    private $password = "root";
    
    // private $db_name = "glintqnj_pracharwall";
    // private $username = "glintqnj_pracharwall";
    // private $password = "Giplwall@12qw";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>