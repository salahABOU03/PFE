<?php
class database {
   
    private $dbname="dicedb";
    private $host="localhost";
    private $username="root";
    private $password="";
    private $conn=null;
    function connect(){
        try {
            $conn=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
            //echo "Connected";
        } catch (PDOException $e) {
            echo "Connection Error ".$e->getMessage();
        }
        return $conn;
    }
}

?>
