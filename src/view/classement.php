<?php
include_once '../models/user_manager.php' ; 
$hscore = getHighscore($_SESSION["name"]);
if ($_SESSION["score"]>$hscore)
        $setHighscore($_SESSION["name"],$hscore);
$scoreboard = getAllUserHightscore();
print implode(";",$scoreboard);
?>

