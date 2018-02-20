<?php

class Players
{

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function getPlayers()
    {
        $request = "SELECT * FROM `joueurs`";
        $stmt  = $this->conn->prepare($request);
        $stmt->execute();

        return $stmt->fetch();
    }

}
