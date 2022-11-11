<?php

class OpentdbAPI {

	/**
	 * Call the API to get an array & format it.
	 *
	 * @param int $nombreQuestion
	 * @param int $category
	 * @param string $difficulty
	 *        	easy
	 * @param string $typeQuizz
	 *        	multiple
	 * @return an array of form
	 *         array(1) { [0]=> array(3) {
	 *         ["question"] => "Question ?",
	 *         ["answers"] => { [0] => "answer1", [1] => "answer2", [2] => "answer3", [3] => "answer4" },
	 *         ["correct_answer"] => string(5) "correct_answer"
	 *         }
	 */
	public static function GetQuestions($nombreQuestion, $category, $difficulty, $typeQuizz){
		$questions_form_api = self::GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz);
		return self::ConvertArrayFormat($questions_form_api);
	}

	/**
	 * Call the API.
	 *
	 * @param int $nombreQuestion
	 * @param int $category
	 * @param string $difficulty
	 *        	easy
	 * @param string $typeQuizz
	 *        	multiple
	 * @return mixed
	 */
	private static function GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz){
		$jsonAPIQuestions = file_get_contents("https://opentdb.com/api.php?amount=".$nombreQuestion."&category=".$category."&difficulty=".$difficulty."&type=".$typeQuizz);
		return json_decode($jsonAPIQuestions, true)['results'];
	}

	/**
	 * Convert API question to question for question.php
	 *
	 * @param unknown $APIQuestions
	 * @param unknown $nombreQuestion
	 * @return NULL[]
	 */
	private static function ConvertArrayFormat($APIQuestions){
		$questions = array();
		foreach($APIQuestions as $APIQuestion){
			$APIQuestion['incorrect_answers'] = self::AddCorrectAnswerToAnswerList($APIQuestion['incorrect_answers'], $APIQuestion['correct_answer']);
			$questions[] = self::AddNewFormattedQuestion($APIQuestion);
		}
		return $questions;
	}

	/**
	 * Add the correct awnser to the awnser list at a random position.
	 *
	 * @param array $incorrectAnswers
	 * @param string $correctAnswer
	 * @return array
	 */
	private static function AddCorrectAnswerToAnswerList($incorrectAnswers, $correctAnswer){
		array_splice($incorrectAnswers, rand(0, 4), 0, $correctAnswer);
		return $incorrectAnswers;
	}

	/**
	 * Reformat the question so their are understand by question.php
	 *
	 * @param unknown $jsonApiQuestion
	 * @return unknown[]
	 */
	private static function AddNewFormattedQuestion($APIQuestion){
		return array(
				"question" => $APIQuestion['question'],
				"answers" => $APIQuestion['incorrect_answers'],
				"correct_answer" => $APIQuestion['correct_answer']
		);
	}
}
?>
