<?php
include_once '../models/error.php';
require_once '../models/opentdbAPI.php';
require_once '../public/template.php';

session_start();
extract($_POST);

if(isset($name)){
	$_SESSION["name"] = $name;
	$_SESSION["question_id"] = 0;
	$_SESSION["score"] = 0;
	$_SESSION['nombre_question'] = 5;
	$_SESSION['category'] = 9;
	$_SESSION['difficulty'] = "easy";
	$_SESSION['type_question'] = "multiple";

	$_SESSION['questions'] = OpentdbAPI::GetQuestions($_SESSION['nombre_question'], $_SESSION['category'], $_SESSION['difficulty'], $_SESSION['type_question']);
}

if($_SESSION["question_id"] < $_SESSION["nombre_question"]){
	$info_current_question = $_SESSION["questions"][$_SESSION["question_id"]];

	if(isset($choix)){
		if($choix == $info_current_question["correct_answer"]){
			$_SESSION["score"] += 1;
		}
		$_SESSION["question_id"]++;
	}

	loadView('question', array('main'), [
			'choix' => isset($choix) ? $choix : null,
			'info_question' => $info_current_question
	]);
}else{
	loadView('resultat', array('main'), []);
}

?>