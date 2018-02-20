<?php

include_once '../config/db_config.php';
include_once '../objects/request.php';

$database = new Database();
$db       = $database->getConnection();

$entity = new Request($db);

$url_send = "https://api.rocketleaguestats.com/v1/player/batch";
$players =  array(
    array(
        "platformId"=>"1", "uniqueId"=>"76561198011378616"),
    array(
        "platformId"=>"1", "uniqueId"=>"76561198072297442"),
    array(
        "platformId"=>"1", "uniqueId"=>"76561198089829593"),
    array(
        "platformId"=>"1", "uniqueId"=>"76561198007270058"),
    array(
        "platformId"=>"1", "uniqueId"=>"76561198011318117"),
    array(
        "platformId"=>"1", "uniqueId"=>"76561198083891159")
);

$data = json_encode($players);

// $options = array(
//     'http' => array(
//         'header'  => "Content-Type: application/json\r\n".
//                      "Authorization: OEEHFLIFNQ0YCAJ9SWHICBTG6YXW7U8B\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($data)
//     )
// );

// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);
// if ($result === FALSE) { echo "ripz"; }

// var_dump($result);

function sendPostData($url, $post){

    $headers = array(
        'Content-type: application/json',
        'Authorization: OEEHFLIFNQ0YCAJ9SWHICBTG6YXW7U8B',
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;  
  }
  
$getPostData = sendPostData($url_send, $data);
$response = json_decode($getPostData, true);
//echo '<pre>' . print_r($response, true) . '</pre>';

    foreach ($response as $key => $value) {

        $uniqueId = $value["uniqueId"];
        $wins = $value["stats"]["wins"];
        $rankPoints = $value["rankedSeasons"][7][11]["rankPoints"];
      
        $stmt = $entity->updateRocketLeague($uniqueId, $wins, $rankPoints);
        if ($stmt == true) {
            echo '{';
            echo '"message": "Stats mis à jour"';
            echo '}';
        } else {
            echo '{';
            echo '"message": "Impossible de mettre à jour la bdd"';
            echo '}';
        }
    }

