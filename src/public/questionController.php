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
    $_SESSION["score"] = 0;
    $_SESSION['nombre_question'] = 4;
    $_SESSION['category'] = 9;
    $_SESSION['difficulty'] = "easy";
    $_SESSION['type_question'] = "multiple";

    $_SESSION['questions'] = OpentdbAPI::GetQuestions($_SESSION['nombre_question'], $_SESSION['category'], $_SESSION['difficulty'], $_SESSION['type_question']);
}

if ($_SESSION["question_id"] < $_SESSION["nombre_question"]) {
    $info_current_question = $_SESSION["questions"][$_SESSION["question_id"]];

    if (isset($choix)) {
        if ($choix == $info_current_question["correct_answer"]) {
            $_SESSION["score"]++;
        }
        $_SESSION["question_id"]++;
    }

    loadView('question.php', ['choix' => isset($choix) ? $choix : null, 'info_question' => $info_current_question]);
} else {
    loadView('resultat.php', []);
}

?>