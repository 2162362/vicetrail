<?php
require_once(__DIR__.'/../connections/local.php');
$update_local_db = 0;
$update_azure_db = 0;
if(isset($_POST['update_azure_db']))
    $update_azure_db = 1;
$sql = "UPDATE configurations SET active = " . $update_azure_db . " WHERE code='update_azure_db'";
$result = runLocalQuery($sql);

if(isset($_POST['update_local_db']))
    $update_local_db = 1;

$sql = "UPDATE configurations SET active = " . $update_local_db . " WHERE code='update_local_db'";
$result = runLocalQuery($sql);

header( 'refresh:2; url=https://vicetrail.000webhostapp.com/configs/index.php' )
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
    </head>
    <body>
        Configs updated successfully. Wait a second...
    </body>
</html>