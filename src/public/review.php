<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/UserManager.php';

Session::redirectUnLog();

$reviews = UserManager::getAllUserReview();

if (Session::isLogin()) {
	$pseudo = Session::getPseudo();
	foreach ($reviews as $key => $value) {
		if ($value['pseudo'] == $pseudo) {
			$id = $key;
		}
	}
	if (isset($id)) {
		$vous = $reviews[$id];
		unset($reviews[$id]);
		$user = $vous['pseudo'];
		$vous['pseudo'] = "Vous ($user)";
		array_unshift($reviews, $vous);
	}
}

Template::loadview('review', array('review'), $reviews);
