
<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);



require_once '../models/opentdb_api.php';

include_once '../public/template.php';


session_start();
extract($_POST);
if (isset($name)) {
    $_SESSION["name"] = $name;
    $_SESSION["question_id"] = 0;
    $_SESSION["score"] = 1;
    $_SESSION['nombre_question'] = 3;
    $_SESSION['category'] = 9;
    $_SESSION['difficulty'] = "easy";
    $_SESSION['type_question'] = "multiple";

    $_SESSION['questions'] = OpentdbAPI::GetQuestions($_SESSION['nombre_question'], $_SESSION['category'], $_SESSION['difficulty'], $_SESSION['type_question']);
}

loadView('question.php', ['choix' => isset($choix)?$choix:null, 'info' => $_SESSION['questions'][$_SESSION["question_id"]]]);


?>