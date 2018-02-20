<?php

class Request
{

    private $bdd;

    public function __construct(PDO $db){

        $this->conn= $db;
    }

    public function updateRocketLeague($player, $wins, $rankPoints){


        $query = "UPDATE `relation joueur-rocket_league` SET `Wins`= :wins,`RankedPoints`= :rankPoints WHERE `SteamIdJoueur`= :player";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'player'     => $player,
                'wins'       => $wins,
                'rankPoints' => $rankPoints,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }


}
