<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/UserManager.php';

Session::redirectUnLog();
$pseudo = Session::getPseudo();
$highscore = UserManager::getHighscore($pseudo);
$nbparties = UserManager::getNbparties($pseudo);

Template::loadview('profil', array('profil'), [
	"pseudo" => $pseudo,
	"highscore" => $highscore,
	"nbparties" => $nbparties
]);
