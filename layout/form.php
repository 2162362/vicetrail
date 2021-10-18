<?php
    require_once(__DIR__.'/../connections/local.php');
    $sql = "SELECT player_value, player_name FROM players ORDER BY player_value";
    $player_result = runLocalQuery($sql);
?>
<form action="/post_data.php" method="post">
    <div class="field">
        <div class="control columns">
            <div class="column is-narrow">
                <label class="label">Player</label>
                <div class="select is-normal">
                    <select id="players" name="players">
                        <option value="" selected disabled>Select player</option>
                        <?php 
                        foreach($player_result as $player){
                            echo "<option value=\"".$player["player_value"]."\">".$player["player_name"]."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="column is-narrow">
                <label class="label">Experience</label>
                <div class="select is-normal">
                    <select id="game_experience" name="game_experience">
                        <option value="" selected disabled>Select game experience</option>
                        <option value="awful">Awful</option>
                        <option value="bad">Bad</option>
                        <option value="unremarkable">Unremarkable</option>
                        <option value="good">Good</option>
                        <option value="awesome">Awesome</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input class="button is-link" type="submit" value="Submit">
        </div>
    </div>
</form>