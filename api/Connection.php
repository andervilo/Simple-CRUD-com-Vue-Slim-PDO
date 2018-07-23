<?php

class Connection {
    
    protected $conn;
    function __construct() {
        
    }
    
    public function getConnection() {
        try {
            return $this->conn = new PDO('mysql:host=localhost;dbname=crudvue;charset=utf8', 'root', '',
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_PERSISTENT => false,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
                    ));            
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
            
    }

}

