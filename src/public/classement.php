<?php
require_once 'template.php';
require_once '../models/userManager.php';
session_start();
$scoreboard = UserManager::getAllUserHighscore();
if(isset($_SESSION["name"])){
	foreach($scoreboard as $key => $value){
		if($value['pseudo'] == $_SESSION["name"]){
			$id = $key;
		}
	}
	if(isset($id)){
		$vous = $scoreboard[$id];
		unset($scoreboard[$id]);
		$pseudo = $vous['pseudo'];
		$vous['pseudo'] = "Vous ($pseudo)";
		array_unshift($scoreboard, $vous);
	}
}
loadview('classement', array(
		'classement'
), $scoreboard);
