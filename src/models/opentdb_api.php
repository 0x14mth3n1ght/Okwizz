
<?php
class OpentdbAPI
{

  // déclaration des méthodes

  public static function GetQuestions($nombreQuestion, $category, $difficulty, $typeQuizz)
  {
    $questions_form_api = self::GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz);
    return self::ConvertArrayFormat($questions_form_api, $nombreQuestion);
  }

  public static function GetQuestionsFromAPI($nombreQuestion, $category, $difficulty, $typeQuizz)
  {
    $json_api_questions = file_get_contents("https://opentdb.com/api.php?amount=" . $nombreQuestion
      . "&category=" . $category
      . "&difficulty=" . $difficulty
      . "&type=" . $typeQuizz);

    return json_decode($json_api_questions, true)['results'];
  }

  private static function ConvertArrayFormat($jsonApiQuestions, $nombreQuestion)
  {
    $questions = array();

    for ($id = 0; $id < $nombreQuestion; $id++) {
      self::AddRandomlyCorrectAnswerToAnswerList($jsonApiQuestions[$id], $jsonApiQuestions[$id]['correct_answer'], $nombreQuestion);
      $questions[$id] = self::AddNewFormattedQuestion($jsonApiQuestions[$id]);
    }

    return $questions;
  }

  private static function AddRandomlyCorrectAnswerToAnswerList(&$jsonApiQuestion, $jsonCorrectAnswer, $nombreQuestion)
  {
    array_splice($jsonApiQuestion['incorrect_answers'],rand(0,$nombreQuestion-1),0, $jsonCorrectAnswer);
  }

  private static function AddNewFormattedQuestion($jsonApiQuestion)
  {
    return array(
      "question" => $jsonApiQuestion['question'],
      "answers" => $jsonApiQuestion['incorrect_answers'],
      "correct_answer" => $jsonApiQuestion['correct_answer']
    );
  }
}
?>
