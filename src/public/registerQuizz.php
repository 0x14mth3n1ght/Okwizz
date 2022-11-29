
<?php
require_once '../models/quizzManager.php';
require_once '../models/quizz.php';
require_once '../public/template.php';

session_start(); //recuperation des variables de sessions
extract($_POST); //recuperation des variables du POST
$_SESSION["name"] = "Wacim";

if (isset($_SESSION["name"])) {
    $quizz_test = new Quizz($title, $_SESSION["name"], "0");
    $question1 = new Question($question1, $prop1_1, [$prop1_2, $prop1_3, $prop1_4]);
    $question2 = new Question($question2, $prop2_1, [$prop2_2, $prop2_3, $prop2_4]);
    $question3 = new Question($question3, $prop3_1, [$prop3_2, $prop3_3, $prop3_4]);
    $question4 = new Question($question4, $prop4_1, [$prop4_2, $prop4_3, $prop4_4]);
    $question5 = new Question($question5, $prop5_1, [$prop5_2, $prop5_3, $prop5_4]);

    $quizz_test->addQuestion($question1);
    $quizz_test->addQuestion($question2);
    $quizz_test->addQuestion($question3);
    $quizz_test->addQuestion($question4);
    $quizz_test->addQuestion($question5);
    QuizzManager::addQuizz($quizz_test);
}

loadView('home', array('main'), NULL);
