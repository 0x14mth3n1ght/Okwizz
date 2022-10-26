<?php
require_once '../models/user_manager.php' ; 
$um = new UserManager();

$hscore = $um->getHighscore($_SESSION["name"]);

$scoreboard = $um->getAllUserHightscore();
print implode(";",$scoreboard);
?>

