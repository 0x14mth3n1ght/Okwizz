<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/QuizzManager.php';

Session::redirectUnLog();
$quizz_id = Utils::getPostOrRedirect("quizz_id");

$quizz = QuizzManager::getQuizz($quizz_id);

Session::setVar("quizz/quizz", $quizz);
Session::setVar("quizz/started", false);

Utils::redirect("question.php");
