<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/OpendbAPI.php';

Session::redirectUnLog();
$difficulty = Utils::getPostOrRedirect("difficulty");

if ($difficulty == "AnyDifficulty")
	$difficulty = ["easy", "medium", "hard"][rand(0, 2)];

Session::setVar("quizz/difficulty", $difficulty);

$nb_question = 5;
$type_question = "multiple";
$category = Session::getVar("quizz/category");
$quizz = OpentdbAPI::GetQuizz($nb_question, $category, $difficulty, $type_question);

Session::setVar("quizz/quizz", $quizz);
Session::setVar("quizz/started", false);

Utils::redirect("question.php");
