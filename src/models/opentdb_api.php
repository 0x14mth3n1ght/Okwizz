
<?php
class OpentdbAPI
{

    // déclaration des méthodes

    public static function GetQuestions($nombreQuestion, $category, $difficulty, $typeQuizz) {
        $questions_form_api = self::GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz);
        return self::ConvertArrayFormat($questions_form_api, $nombreQuestion);
    }

    public static function GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz) {
		$json_api_questions = file_get_contents("https://opentdb.com/api.php?amount=" . $nombreQuestion 
			. "&category=" . $category 
			. "&difficulty=" . $difficulty
			. "&type=" . $typeQuizz);

		return json_decode($json_api_questions, true)['results'];
    }

    private static function ConvertArrayFormat($jsonApiQuestions, $nombreQuestion){
		$questions = array();

		for ($id = 0; $id < $nombreQuestion; $id++) {
            self::AddRandomlyCorrectAnswerToAnswerList($jsonApiQuestions[$id], $jsonApiQuestions[$id]['correct_answer']);
            $questions[$id] = self::AddNewFormattedQuestion($jsonApiQuestions[$id]);
		}

        return $questions;
    }

    private static function AddRandomlyCorrectAnswerToAnswerList(&$jsonApiQuestion, $jsonCorrectAnswer){
		array_push($jsonApiQuestion['incorrect_answers'], $jsonCorrectAnswer);
    }

    private static function AddNewFormattedQuestion($jsonApiQuestion){
			return array(
				"question" => $jsonApiQuestion['question'],
				"awnsers" => $jsonApiQuestion['incorrect_answers'],
				"correct_awnser" => $jsonApiQuestion['correct_answer']
			);
    }
    
}
?>
