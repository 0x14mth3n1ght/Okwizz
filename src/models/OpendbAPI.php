<?php
require_once 'QuizzManager.php';
require_once 'Quizz.php';

class OpentdbAPI
{

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
	public static function GetQuestions($nombreQuestion, $category, $difficulty, $typeQuizz)
	{
		$questions_form_api = self::GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz);
		return self::ConvertArrayFormat($questions_form_api);
	}

	public static function GetQuizz($nombreQuestion, $category, $difficulty, $typeQuizz): Quizz
	{
		$questions_form_api = self::GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz);
		return self::ConvertToQuizz($questions_form_api);
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
	private static function GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz)
	{
		$api_url = "https://opentdb.com/api.php?amount=" . $nombreQuestion . "&type=" . $typeQuizz;
		if ($category != 0) {
			$api_url .= "&category=" . $category;
		}
		if ($difficulty != "any difficulty") {
			$api_url .= "&difficulty=" . $difficulty;
		}
		$jsonAPIQuestions = file_get_contents($api_url);
		return json_decode($jsonAPIQuestions, true)['results'];
	}

	/**
	 * Convert API question to question for question.php
	 *
	 * @param unknown $APIQuestions
	 * @param unknown $nombreQuestion
	 * @return NULL[]
	 */
	private static function ConvertArrayFormat($APIQuestions)
	{
		$questions = array();
		foreach ($APIQuestions as $APIQuestion) {
			$APIQuestion['incorrect_answers'] = self::AddCorrectAnswerToAnswerList($APIQuestion['incorrect_answers'], $APIQuestion['correct_answer']);
			array_push($questions, self::AddNewFormattedQuestion($APIQuestion));
		}
		return $questions;
	}

	private static function ConvertToQuizz($APIQuestions)
	{
		$quizz = new Quizz("", "", 0, -1);
		foreach ($APIQuestions as $APIQuestion) {
			$qe = new Question($APIQuestion["question"], $APIQuestion["correct_answer"], $APIQuestion["incorrect_answers"]);
			$quizz->addQuestion($qe);
		}
		return $quizz;
	}

	/**
	 * Add the correct awnser to the awnser list at a random position.
	 *
	 * @param array $incorrectAnswers
	 * @param string $correctAnswer
	 * @return array
	 */
	public static function AddCorrectAnswerToAnswerList($incorrectAnswers, $correctAnswer)
	{
		array_splice($incorrectAnswers, rand(0, 4), 0, $correctAnswer);
		return $incorrectAnswers;
	}

	/**
	 * Reformat the question so their are understand by question.php
	 *
	 * @param unknown $jsonApiQuestion
	 * @return unknown[]
	 */
	private static function AddNewFormattedQuestion($APIQuestion)
	{
		return array(
			"question" => $APIQuestion['question'],
			"answers" => $APIQuestion['incorrect_answers'],
			"correct_answer" => $APIQuestion['correct_answer']
		);
	}
}
