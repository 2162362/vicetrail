<?php
    require_once(__DIR__.'/../connections/local.php');
    $sql = "SELECT COUNT(*) as total_games FROM battlefied";
    $totalGames = runLocalQuery($sql)[0]["total_games"];

    $sql = "SELECT players.player_name AS player_real_name, (SELECT COUNT(*) FROM battlefied WHERE battlefied.player_name = player_real_name) as total_games FROM players LEFT JOIN battlefied ON battlefied.player_name = players.player_value GROUP BY players.player_name";
    $totalGamesPerPlayer = runLocalQuery($sql);

    $sql = "SELECT sub.effective_date, COUNT(*) AS total_games
            FROM
            (
                SELECT
                CASE
                    WHEN HOUR(session_date) < 4 THEN DATE_FORMAT(DATE_ADD(session_date, INTERVAL -1 DAY), '%Y/%m/%d')
                    ELSE DATE_FORMAT(session_date, '%Y/%m/%d')
                END AS effective_date
                FROM battlefied
            ) as sub
            GROUP BY sub.effective_date
            ORDER BY total_games DESC
            LIMIT 1";
    $dayWithMostGames = runLocalQuery($sql)[0];
?>
<div class="block"><strong>Total games:</strong> <?php echo($totalGames) ?></div>
<div class="block">
    <strong>Day with most games:</strong> <?php echo(date('d/m/Y', strtotime($dayWithMostGames["effective_date"]))) ?> 
    (<?php echo(date('l', strtotime($dayWithMostGames["effective_date"])). " with " . $dayWithMostGames["total_games"]) ?> games)
</div>
<div class="block">
    <strong>Games per user:</strong>
    <table class="table">
        <thead>
            <tr>
                <th>Player</th>
                <th>Game count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($totalGamesPerPlayer) > 0) {
                // output data of each row
                foreach($totalGamesPerPlayer as $row) {
                echo "<tr><td>" . $row["player_real_name"]. " </td><td> " . $row["total_games"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan=\"2\">0 results</td></tr>";
            }
            ?>
        </tbody>
    <table>
</div>