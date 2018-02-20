<?php

require_once('../config/db_config.php');
require_once('../objects/Request.php');
require_once('../objects/Players.php');

$database = new Database();
$db       = $database->getConnection();

$entity = new Request($db);

$players  = new Players($db);

$players->getPlayers();
var_dump($players);
die();

























//$url_send = "https://api.rocketleaguestats.com/v1/player/batch";















//
//$data = json_encode($players);
//function sendPostData($url, $post)
//{
//
//    $headers = array(
//        'Content-type: application/json',
//        'Authorization: OEEHFLIFNQ0YCAJ9SWHICBTG6YXW7U8B',
//    );
//
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//    $result = curl_exec($ch);
//    curl_close($ch);
//
//    return $result;
//}
//
//$getPostData = sendPostData($url_send, $data);
//$response    = json_decode($getPostData, true);
////echo '<pre>' . print_r($response, true) . '</pre>';
//
//foreach ($response as $key => $value) {
//
//    $uniqueId   = $value["uniqueId"];
//    $wins       = $value["stats"]["wins"];
//    $rankPoints = $value["rankedSeasons"][7][11]["rankPoints"];
//
//    $stmt = $entity->updateRocketLeague($uniqueId, $wins, $rankPoints);
//    if ($stmt == true) {
//        echo '{';
//        echo '"message": "Stats mis à jour"';
//        echo '}';
//    } else {
//        echo '{';
//        echo '"message": "Impossible de mettre à jour la bdd"';
//        echo '}';
//    }
//}
