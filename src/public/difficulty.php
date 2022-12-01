<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/Template.php';

Session::redirectUnLog();
$category = Session::getVar("quizz/category");

$difficulties = array(
	["DifficulteName" => "AnyDifficulty", "DifficulteImg" => "question-mark.png"],
	["DifficulteName" => "easy", "DifficulteImg" => "thumbs-up.png"],
	["DifficulteName" => "medium", "DifficulteImg" => "chilli.png"],
	["DifficulteName" => "hard", "DifficulteImg" => "hard.png"]
);

Template::loadView('difficulty', ['difficulteQuizz'], ["difficultes" => $difficulties, 'category' => $category]);
