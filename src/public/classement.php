<?php
require_once 'template.php';
require_once '../models/userManager.php';
$scoreboard = UserManager::getAllUserHightscore();
loadview("classement.php", $scoreboard);
?>
