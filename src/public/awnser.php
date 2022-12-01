<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/Quizz.php';

Session::redirectUnLog();

$choix = Utils::getPostOrRedirect("choix");

$pseudo = Session::getPseudo();
$score = Session::getVar("user/score");
$question = Session::getVar("question/question", true);
$start = Session::getVar("question/start");

if ($choix == $question->getCorrectAwnserPosition())
	$score += max(0, 30 - strtotime('now') + $start);

Session::setVar("user/score", $score);

Template::loadView('anwser', array('main'), [
	'pseudo' => $pseudo,
	'score' => $score,
	'choix' => $choix,
	'question' => $question
]);
