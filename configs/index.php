<?php
require_once(__DIR__.'/../connections/local.php');
$sql = "SELECT active FROM configurations WHERE code=\"update_local_db\" LIMIT 1";
$result = runLocalQuery($sql);
$update_local_db = $result[0]["active"];
$update_local_db_checked = ($update_local_db == 1 ? "checked" : "");

$sql = "SELECT active FROM configurations WHERE code=\"update_azure_db\" LIMIT 1";
$result = runLocalQuery($sql);
$update_azure_db = $result[0]["active"];
$update_azure_db_checked = ($update_azure_db == 1 ? "checked" : "");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hello!</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
<section class="section">
<div class="container">
<form action="post_data.php" method="post">
    <div class="field">
        <div class="control">
            <label class="checkbox">
                <input type="checkbox" name="update_azure_db" value="update_azure_db" <?php echo($update_azure_db_checked) ?>>
                Update remote db (Azure)
            </label>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <label class="checkbox">
                <input type="checkbox" name="update_local_db" value="update_local_db" <?php echo($update_local_db_checked) ?>>
                Update local db (000webhost)
            </label>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input class="button is-link" type="submit" value="Submit">
        </div>
    </div>
</form>
</div>
</section>
</body>
</html>