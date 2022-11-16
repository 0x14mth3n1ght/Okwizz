<?php
require_once '../public/template.php';

session_start();
extract($_POST);

$difficulte = array(
    ["DifficulteName" => "any difficulty", "DifficulteImg" => "question-mark.png"],
    ["DifficulteName" => "easy", "DifficulteImg" => "thumbs-up.png"],
    ["DifficulteName" => "medium", "DifficulteImg" => "chilli.png"],
    ["DifficulteName" => "hard", "DifficulteImg" => "hard.png"]
);

loadView('difficulteQuizz', array('difficulteQuizz') , array( "name" => $name, "category" => $category, "difficulte" => $difficulte));
?>