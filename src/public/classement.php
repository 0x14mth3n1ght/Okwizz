<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/UserManager.php';

$scoreboard = UserManager::getAllUserHighscore();

if (Session::isLogin()) {
	$pseudo = Session::getPseudo();
	foreach ($scoreboard as $key => $value) {
		if ($value['pseudo'] == $pseudo) {
			$id = $key;
		}
	}
	if (isset($id)) {
		$vous = $scoreboard[$id];
		unset($scoreboard[$id]);
		$user = $vous['pseudo'];
		$vous['pseudo'] = "Vous ($user)";
		array_unshift($scoreboard, $vous);
	}
}

Template::loadview('classement', array('classement'), $scoreboard);
