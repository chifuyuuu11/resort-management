<?php

class Database {
    private $servername = "localhost";
    private $dbname = "resort_management";
    private $username = "root";
    private $password = "";

    protected function conn() {
        try {
            $conn = new PDO("mysql:dbname=$this->dbname;port=3307;host=$this->servername", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
        } catch (PDOException $e) {
            echo "Error message: ". $e->getMessage();
            die();

        }
    }
}
?>