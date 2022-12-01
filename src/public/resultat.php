<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/UserManager.php';
require_once '../models/QuizzManager.php';

$pseudo = Session::getPseudo();

$score = Session::getVar("user/score");
$hscore = UserManager::getHighscore($pseudo);

if ($score > $hscore)
	UserManager::setHighscore($pseudo, $score);

UserManager::incNbparties($pseudo);

$q = Session::getVar("quizz/quizz", true);
if ($q->getId() >= 0)
	QuizzManager::incNbparties($q->getId());

Template::loadView('resultat', ['main'], [
	'pseudo' => $pseudo,
	'score' => $score,
	'hscore' => $hscore
]);
