<?php
include_once 'error.php';
require_once 'db.php';
require_once 'quizz.php';

class QuizzManager
{

	# =========
	# == API ==
	# =========

	# == Constructeur & Destructeur ==

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

	# == Setter ==

	public static function incNbparties(int $quizz_id): bool
	{
		return self::incNbpartiesDB($quizz_id);
	}

	# == Other fontions ==

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
		$stmt = DB::getDB()->prepare("SELECT last_insert_rowid() 'id';");
		return DB::tryRunStmtR($stmt)[0]["id"];
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

	private static function getQuizzDB(int $id)
	{
		$stmt = DB::getDB()->prepare("SELECT q.title,
			q.pseudo,
			q.nbparties
		FROM quizz q
		WHERE q.id = :id;");
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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

	private static function incNbpartiesDB(int $id): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE quizz
		SET nbparties = (
				SELECT q.nbparties
				FROM quizz q
				WHERE id = :id
			) + 1
		WHERE id = :id;");
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Other fontions ==

	private static function listQuizzDB()
	{
		$stmt = DB::getDB()->prepare("SELECT q.id,
			q.title,
			q.pseudo,
			q.nbparties
		FROM quizz q
		ORDER BY q.nbparties DESC;");
		return DB::tryRunStmtR($stmt);
	}
}
