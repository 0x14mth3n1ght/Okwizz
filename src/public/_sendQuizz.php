
<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/QuizzManager.php';
require_once '../models/Quizz.php';

Session::redirectUnLog();

$pseudo = Session::getPseudo();
$title = Utils::getPostOrRedirect("title");

$quizz = new Quizz($title, $pseudo, 0);
for ($i = 1; $i < 6; $i++) {
	$questiontext = Utils::getPostOrRedirect("question" . $i);
	$prop1 = Utils::getPostOrRedirect("prop" . $i . "_1");
	$prop2 = Utils::getPostOrRedirect("prop" . $i . "_2");
	$prop3 = Utils::getPostOrRedirect("prop" . $i . "_3");
	$prop4 = Utils::getPostOrRedirect("prop" . $i . "_4");
	$question = new Question($questiontext, $prop1, [$prop2, $prop3, $prop4]);
	$quizz->addQuestion($question);
}
QuizzManager::addQuizz($quizz);

Utils::redirect();
