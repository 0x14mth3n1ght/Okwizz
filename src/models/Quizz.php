<?php

/**
 * Question DTO
 * Class that represente a Question of a MCQ.
 */
class Question
{
	/**
	 * @param string $question the question asked to the user.
	 * @param string $correctAwnser the correct awnser to the question.
	 * @param array $wrongAwnsers a list of string of size 3 containing the wrong awnser to the question.
	 * @throws OutOfRangeException if the list $wrongAwnsers does not contain 3 elements.
	 */
	public function __construct(
		string $question,
		string $correctAwnser,
		array $wrongAwnsers
	) {
		$this->question = $question;
		$this->correctAwnser = $correctAwnser;
		$this->wrongAwnsers = $wrongAwnsers;
		if (count($wrongAwnsers) != 3)
			throw new OutOfRangeException("should be 3 wrongs awnsers");
		$this->correctAwnsersPosition = rand(0, 3);
	}

	/**
	 * @var string $question the question asked to the user.
	 */
	private string $question;
	/**
	 * 
	 * @var string $correctAwnser the correct awnser to the question.
	 */
	private string $correctAwnser;
	/**
	 * 
	 * @var array $wrongAwnsers a list of string of size 3 containing the wrong awnser to the question.
	 */
	private array $wrongAwnsers; // array of string

	/**
	 * @var int $correctAwnsersPosition position of the wrong awnser in getAllAwnsers.
	 */
	private int $correctAwnsersPosition;

	/**
	 * 
	 * @return string, get the question asked to the user.
	 */
	public function getQuestion(): string
	{
		return $this->question;
	}

	/**
	 * 
	 * @return string, get the correct awnser to the question.
	 */
	public function getCorrectAwnser(): string
	{
		return $this->correctAwnser;
	}

	/**
	 * 
	 * @return array, get a list of string of size 3 containing the wrong awnser to the question.
	 */
	public function getWrongAwnsers(): array
	{
		return $this->wrongAwnsers;
	}

	/**
	 * @return array, get the list of awnsers with the correct awnser at a radom constant place.
	 */
	public function getAllAwnsers(): array
	{
		$allAnswers = $this->wrongAwnsers;
		array_splice($allAnswers, $this->correctAwnsersPosition, 0, $this->correctAwnser);
		return $allAnswers;
	}

	/**
	 * @return int, get the position of the correct awnser.
	 */
	public function getCorrectAwnserPosition(): int
	{
		return $this->correctAwnsersPosition;
	}
}

/**
 * Quizz DTO
 * Class that represent a MCQ Quizz.
 */
class Quizz
{

	/**
	 * @param string $title the name of the Quizz.
	 * @param string $pseudo the pseudo of the player that register the quizz.
	 * @param int $nbParties the numbers of parties all players have played that Quizz.
	 * @param int $quizz_id the is of the quizz in the database (if querry from the database).
	 */
	public function __construct(
		string $title,
		string $pseudo,
		int $nbParties,
		int $quizz_id = NULL
	) {
		$this->title = $title;
		$this->pseudo = $pseudo;
		$this->nbParties = $nbParties;
		$this->questions = array();
		$this->quizz_id = $quizz_id;
	}

	/**
	 * 
	 * @var string $title the name of the Quizz.
	 */
	private string $title;
	/**
	 * 
	 * @var string $pseudo the pseudo of the player that register the quizz. 
	 */
	private string $pseudo;
	/**
	 * 
	 * @var int $nbParties the numbers of parties all players have played that Quizz.
	 */
	private int $nbParties;
	/**
	 * 
	 * @var array $questions a list of Question (see above) that compose the Quizz. 
	 */
	private array $questions; // array of Question*

	/**
	 * 
	 * @return string, get the name of the Quizz.
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * 
	 * @return string, get the pseudo of the player that register the quizz.
	 */
	public function getPseudo(): string
	{
		return $this->pseudo;
	}

	/**
	 * 
	 * @return int, a list of Question (see above) that compose the Quizz.
	 */
	public function getNbParties(): int
	{
		return $this->nbParties;
	}

	/**
	 * 
	 * @return array, the list of Question in that Quizz.
	 */
	public function getQuestions(): array
	{
		return $this->questions;
	}

	/**
	 * 
	 * @return int, the id of the quizz.
	 */
	public function getId(): int
	{
		return $this->quizz_id;
	}

	/**
	 * 
	 * @param Question $qe add a Question to the Quizz.
	 * The order of the questions in the Quizz if fixe.
	 * The first Question add with this function will be the first one added to the list of Question.
	 * The order of the list is save when register in the database and read back from the database.
	 */
	public function addQuestion(Question $qe)
	{
		array_push($this->questions, $qe);
	}
}
