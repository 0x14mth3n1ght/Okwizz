<?php
include_once '../models/error.php';
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/Quizz.php';

Session::redirectUnLog();

if (!Session::isVar("quizz/started")) {
	Session::setVar("quizz/started", true);
	Session::setVar("user/score", 0);
	$index = 0;
} else {
	$index = Session::getVar("question/index") + 1;
}

Session::setVar("question/index", $index);
$pseudo = Session::getPseudo();

$score = Session::getVar("user/score");
$quizz = Session::getVar("quizz/quizz", true);

if ($index < count($quizz->GetQuestions())) {
	$question = $quizz->GetQuestions()[$index];

	Session::setVar("question/question", $question);

	$start = strtotime('now');
	Session::setVar("question/start", $start);

	Template::loadView('question', array('main'), [
		'pseudo' => $pseudo,
		'score' => $score,
		'question' => $question
	]);
} else {
	Utils::redirect("resultat.php");
}
