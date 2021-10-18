<?php
require_once(__DIR__.'/connections/local.php');
require_once(__DIR__.'/connections/azure.php');

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Europe/Lisbon');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ H:i:s');
}

$sql = "SELECT active FROM configurations WHERE code=\"update_local_db\" LIMIT 1";
$result = runLocalQuery($sql);
$update_local_db = $result[0]["active"];

$sql = "SELECT active FROM configurations WHERE code=\"update_azure_db\" LIMIT 1";
$result = runLocalQuery($sql);
$update_azure_db = $result[0]["active"];

if($update_local_db){
    $sql = "INSERT INTO battlefied (player_name, session_experience, session_date)
            VALUES ('" . $_POST["players"] . "','" . $_POST["game_experience"] . "','" . getDatetimeNow() . "')";
    $result = runLocalQuery($sql);
}

if($update_azure_db){
    $azure_data =  array(
                        'playerName' => $_POST["players"],
                        'sessionDate' => getDatetimeNow(),
                        'sessionExperience' => $_POST["game_experience"]);
    $webhook = 'created azure webhook URL here';
    $result = postAzureWebhook($azure_data, $webhook);
}

header( 'refresh:2; url=https://vicetrail.000webhostapp.com' )
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
    </head>
    <body>
        New record created successfully. Wait a second...
    </body>
</html>