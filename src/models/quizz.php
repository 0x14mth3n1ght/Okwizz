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
	}

	/**
	 * @var $question the question asked to the user.
	 */
	private string $question;
	/**
	 * 
	 * @var $correctAwnser the correct awnser to the question.
	 */
	private string $correctAwnser;
	/**
	 * 
	 * @var $wrongAwnsers a list of string of size 3 containing the wrong awnser to the question.
	 */
	private array $wrongAwnsers; // array of string

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
	 */
	public function __construct(
		string $title,
		string $pseudo,
		int $nbParties
	) {
		$this->title = $title;
		$this->pseudo = $pseudo;
		$this->nbParties = $nbParties;
		$this->questions = array();
	}

	/**
	 * 
	 * @var $title the name of the Quizz.
	 */
	private string $title;
	/**
	 * 
	 * @var $pseudo the pseudo of the player that register the quizz. 
	 */
	private string $pseudo;
	/**
	 * 
	 * @var $nbParties the numbers of parties all players have played that Quizz.
	 */
	private int $nbParties;
	/**
	 * 
	 * @var $questions a list of Question (see above) that compose the Quizz. 
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
	 * @param Question $qe add a Question to the Quizz.
	 * The order of the questions in the Quizz if fixe.
	 * The first Question add with this function will be the first one added to the list of Question.
	 * The order of the list is save when register in the database and read back from the database.
	 */
	public function addQuestion(Question $qe)
	{
		$this->questions[] = $qe;
	}
}
