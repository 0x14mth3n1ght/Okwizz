<?php
include_once 'error.php';
require_once 'db.php';
require_once 'quizz.php';
require_once 'opentdbAPI.php';

class QuizzManager
{

	# =========
	# == API ==
	# =========

	# == Constructeur & Destructeur ==

	/**
	 * Add a Quizz to the database.
	 * 
	 * @param Quizz $qz the quizz to save in the database. (see quizz.php for the Quizz type)
	 * @return bool return false if fail, true otherwise.
	 */
	public static function addQuizz(Quizz $qz): bool
	{
		$quizz_id = self::addQuizzDB($qz->getTitle(), $qz->getPseudo());
		if (!$quizz_id)
			return false;
		var_dump($quizz_id);
		foreach ($qz->getQuestions() as $key => $qe) {
			/** @var Question $qe */
			$res = self::addQuestionDB(
				$key,
				$quizz_id,
				$qe->getQuestion(),
				$qe->getCorrectAwnser(),
				$qe->getWrongAwnsers()[0],
				$qe->getWrongAwnsers()[1],
				$qe->getWrongAwnsers()[2]
			);
			if (!$res)
				return false;
		}
		return true;
	}

	# == Getter ==

	/**
	 * 
	 * @param int $quizz_id the id of the Quizz to get.
	 * @return boolean|Quizz false if the Querry fail,
	 * If sucess, it will return a Quizz Obect. (see quizz.php)
	 */
	public static function getQuizz(int $quizz_id)
	{
		$infos = self::getQuizzDB($quizz_id);
		if (!$infos || empty($infos))
			return false;
		$info = $infos[0];
		$qz = new Quizz($info["title"], $info["pseudo"], $info["nbparties"]);

		$infos = self::getQuestionsDB($quizz_id);
		if (!$infos || empty($infos))
			return false;
		foreach ($infos as $info) {
			$qe = new Question(
				$info["question"],
				$info["c_awnser"],
				array($info["w_awnser1"], $info["w_awnser2"], $info["w_awnser3"])
			);
			$qz->addQuestion($qe);
		}

		return $qz;
	}

	/**
	 * 
	 * @param int $quizz_id the id of the Quizz to get.
	 * @return boolean|Quizz false if the Querry fail,
	 * If sucess, it will return a Quizz in API Format. 
	 */
	public static function getQuizzInAPIFormat(int $quizz_id)
	{
		$quizz = self::getQuizz($quizz_id);
		if($quizz == false){
			return false;
		}
		$quizz_api_format = self::convertQuizzToQuizzAPIFormat($quizz);
		return $quizz_api_format;
	}

	/**
	 * 
	 * @param Quizz $quizz the quizz to convert 
	 * @return array it will return a Quizz in API Format. (see opentdbAPI.php)
	 */
	public static function convertQuizzToQuizzAPIFormat(Quizz $quizz)
	{
		$quizz_api_format = array();
		foreach($quizz->getQuestions() as $question){
			$question_api_format = self::convertQuestionToQuestionAPIFormat($question);
			array_push($quizz_api_format, $question_api_format);
		}
		return $quizz_api_format;
	}

	/**
	 * 
	 * @param Question $question the question to convert 
	 * @return array it will return a question in API Format. (see opentdbAPI.php)
	 */
	public static function convertQuestionToQuestionAPIFormat(Question $question)
	{
		$answers_list = OpentdbAPI::AddCorrectAnswerToAnswerList($question->getWrongAwnsers(), $question->getCorrectAwnser());
		return array("question" => $question->getQuestion(), 
					"answers" => $answers_list, 
					"correct_answer" => $question->getCorrectAwnser());
	}

	# == Setter ==

	/**
	 * Increment by 1 the number of parties of that Quizz that have been played. 
	 * 
	 * @param int $quizz_id the id of the quizz.
	 * @return bool
	 */
	public static function incNbparties(int $quizz_id): bool
	{
		return self::incNbpartiesDB($quizz_id);
	}

	# == Other fontions ==

	/**
	 * 
	 * 
	 * @return bool|array return false if failed,
	 * If sucess, return the list of Quizz in the database as an array.
	 * Quizz are represented by the following data structure:
	 * 	[
	 * 		"quizz_id" => 3, // this is the quizz number 3, this number is use to get the quizz istsef, and increment the nbparties counter from the DB later 
	 * 		"title" => "nom du quizz",
	 * 		"pseudo" => "pseudo du joueur qui a crée le quizz",
	 * 		"nbparties" => 37 // 37 player have played that Quizz
	 * 	]
	 */
	public static function listQuizz()
	{
		return self::listQuizzDB();
	}

	# ================
	# == DB QUERRY ==
	# ===============

	# == Constructeur & Destructeur ==

	private static function addQuizzDB(string $title, string $pseudo): int
	{
		$stmt = DB::getDB()->prepare("INSERT INTO quizz (title, pseudo)
		VALUES(:title, :pseudo);");
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		if (!DB::tryRunStmt($stmt, 1))
			return false;
		$stmt = DB::getDB()->prepare("SELECT last_insert_rowid() 'quizz_id';");
		return DB::tryRunStmtR($stmt)[0]["quizz_id"];
	}

	private static function addQuestionDB(
		int $question_id,
		int $quizz_id,
		string $question,
		string $c_awnser,
		string $w_awnser1,
		string $w_awnser2,
		string $w_awnser3
	): bool {
		$stmt = DB::getDB()->prepare("INSERT INTO question (
				question_id,
				quizz_id,
				question,
				c_awnser,
				w_awnser1,
				w_awnser2,
				w_awnser3
			)
		VALUES(
				:question_id,
				:quizz_id,
				:question,
				:c_awnser,
				:w_awnser1,
				:w_awnser2,
				:w_awnser3
			);");
		$stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_INT);
		$stmt->bindValue(':question', $question, PDO::PARAM_STR);
		$stmt->bindValue(':c_awnser', $c_awnser, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser1', $w_awnser1, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser2', $w_awnser2, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser3', $w_awnser3, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Getter ==

	private static function getQuizzDB(int $quizz_id)
	{
		$stmt = DB::getDB()->prepare("SELECT q.title,
			q.pseudo,
			q.nbparties
		FROM quizz q
		WHERE q.quizz_id = :quizz_id;");
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_INT);
		return DB::tryRunStmtR($stmt);
	}

	private static function getQuestionsDB(int $quizz_id)
	{
		$stmt = DB::getDB()->prepare("SELECT q.question,
			q.c_awnser,
			q.w_awnser1,
			q.w_awnser2,
			q.w_awnser3
		FROM question q
		WHERE q.quizz_id = :quizz_id
		ORDER BY q.question_id ASC;");
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_INT);
		return DB::tryRunStmtR($stmt);
	}

	# == Setter ==

	private static function incNbpartiesDB(int $quizz_id): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE quizz
		SET nbparties = (
				SELECT q.nbparties
				FROM quizz q
				WHERE quizz_id = :quizz_id
			) + 1
		WHERE quizz_id = :quizz_id;");
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_INT);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Other fontions ==

	private static function listQuizzDB()
	{
		$stmt = DB::getDB()->prepare("SELECT q.quizz_id,
			q.title,
			q.pseudo,
			q.nbparties
		FROM quizz q
		ORDER BY q.nbparties DESC;");
		return DB::tryRunStmtR($stmt);
	}
}
