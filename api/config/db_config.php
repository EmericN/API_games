<?php

 class Database
 {

    private $host = 'localhost';
    private $dbname = 'game_score';
    private $username = 'localhost';
    private $password = 'localhost';
    public $conn;
    

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->dbname. ";charset=utf8", $this->username, $this->password);
        }
        catch (Exception $e) {
            die('Erreur connexion à le DB : '.$e->getMessage());
        }

        return $this->conn;
    }
 }
