<?php
    require_once(__DIR__.'/../connections/local.php');
    $sql = "SELECT player_name, session_date, session_experience FROM battlefied ORDER BY session_date DESC LIMIT 10";
    $result = runLocalQuery($sql);
?>
<table class="table">
    <thead>
        <tr>
        <th>Player</th>
        <th>Date</th>
        <th>Experience</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($result) > 0) {
            // output data of each row
            foreach($result as $row) {
            echo "<tr><td>" . $row["player_name"]. " </td><td> " . $row["session_date"]. "</td><td> " . $row["session_experience"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan=\"3\">0 results</td></tr>";
        }
        ?>
    </tbody>
</table>