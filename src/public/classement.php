<?php
require_once 'template.php';
require_once '../models/user_manager.php';
$um = new UserManager();
$scoreboard = $um->getAllUserHightscore();
loadview("classement.php", $scoreboard);
?>
