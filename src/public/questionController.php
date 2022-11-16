<?php
include_once '../models/error.php';
require_once '../models/userManager.php';
require_once '../models/opentdbAPI.php';
require_once '../public/template.php';

session_start();
extract($_POST);

if (isset($name)) {
	// We try to register the player if it does not already exist.
	if (!UserManager::registerPlayer($name, "")) {
		// if the player already exist we verify that ir is a player without password.
		if (!UserManager::verifyPassword($name, "")) {
			// if the player exist and as a define password, we can't play so we reload the page.
			header("Location: ./index.php");
		}
	}

	$_SESSION["name"] = $name;
	$_SESSION["question_id"] = 0;
	$_SESSION["score"] = 0;
	$_SESSION['nombre_question'] = 5;
	$_SESSION['category'] = 9;
	$_SESSION["t1"] = 0;
	$_SESSION["t2"] = 0;
	if (isset($category)) {
		$_SESSION['category'] = $category;
	}
	$_SESSION['difficulty'] = "easy";
	if (isset($difficulte)) {
		$_SESSION['difficulte'] = $difficulte;
	}
	$_SESSION['type_question'] = "multiple";

	$_SESSION['questions'] = OpentdbAPI::GetQuestions($_SESSION['nombre_question'], $_SESSION['category'], $_SESSION['difficulty'], $_SESSION['type_question']);
}

if ($_SESSION["question_id"] < $_SESSION["nombre_question"]) {
	$info_current_question = $_SESSION["questions"][$_SESSION["question_id"]];

	if (isset($choix)) {
		$_SESSION["t2"] = strtotime('now');
		if ($choix == $info_current_question["correct_answer"]) {
			$_SESSION["score"] += 30 - ($_SESSION["t2"] - $_SESSION["t1"]);
		}
		$_SESSION["question_id"]++;
	}

	if (isset($choix)) {
		loadView('anwser', array('main'), [
			'choix' => $choix,
			'info_question' => $info_current_question

		]);
	} else {
		$_SESSION["t1"] = strtotime('now');
		loadView('question', array('main'), [
			'info_question' => $info_current_question
		]);
	}
} else {
	loadView('resultat', array('main'), []);
}
