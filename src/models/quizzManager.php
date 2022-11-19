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

	public function addQuizz(Quizz $qz)
	{
		$quizz_id = self::addQuizzDB($qz->getTitle(), $qz->getPseudo());
		foreach ($qz->getQuestions() as $qe) {
			/** @var Question $qe */
			self::addQuestionDB(
				$quizz_id,
				$qe->getQuestion(),
				$qe->getCorrectAwnser(),
				$qe->getWrongAwnsers()[0],
				$qe->getWrongAwnsers()[1],
				$qe->getWrongAwnsers()[2]
			);
		}
	}

	# == Getter ==

	public function getQuizz(int $quizz_id)
	{
		$infos = self::getQuizzDB($quizz_id);
		if (!$infos || empty($infos))
			return false;
		$info = $infos[0];

		$infos = self::getQuestionsDB($quizz_id);
		if (!$infos || empty($infos))
			return false;

		$qes = [];
		foreach ($infos as $info) {
			$qe = new Question(
				$info["question"],
				$info["c_awnser"],
				array($info["w_awnser1"], $info["w_awnser2"], $info["w_awnser3"])
			);
			$qes[] = $qe;
		}

		$qz = new Quizz($info["title"], $info["pseudo"], $info["nbParties"], $qes);
		return $qz;
	}

	# == Setter ==

	public function incNbparties(int $quizz_id)
	{
		return self::incNbpartiesDB($quizz_id);
	}

	# == Other fontions ==

	public function listQuizz(int $quizz_id)
	{
		return self::listQuizzDB($quizz_id);
	}

	# ================
	# == DB QUERRY ==
	# ===============

	# == Constructeur & Destructeur ==

	private function addQuizzDB(string $title, string $pseudo)
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

	private function addQuestionDB(
		int $quizz_id,
		string $question,
		string $c_awnser,
		string $w_awnser1,
		string $w_awnser2,
		string $w_awnser3
	) {
		$stmt = DB::getDB()->prepare("INSERT INTO question (
				quizz_id,
				question,
				c_awnser,
				w_awnser1,
				w_awnser2,
				w_awnser3
			)
		VALUES(
				:quizz_id,
				:question,
				:c_awnser,
				:w_awnser1,
				:w_awnser2,
				:w_awnser3
			);");
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_STR);
		$stmt->bindValue(':question', $question, PDO::PARAM_STR);
		$stmt->bindValue(':c_awnser', $c_awnser, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser1', $w_awnser1, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser2', $w_awnser2, PDO::PARAM_STR);
		$stmt->bindValue(':w_awnser3', $w_awnser3, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Getter ==

	private function getQuizzDB(int $id)
	{
		$stmt = DB::getDB()->prepare("SELECT q.title,
			q.pseudo,
			q.nbparties
		FROM q.quizzs
		WHERE q.id = :id;");
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		return DB::tryRunStmtR($stmt);
	}

	private function getQuestionsDB(int $quizz_id)
	{
		$stmt = DB::getDB()->prepare("SELECT q.question,
			q.c_awnser,
			q.w_awnser1,
			q.w_awnser2,
			q.w_awnser3
		FROM question q
		WHERE q.quizz_id = :quizz_id;");
		$stmt->bindValue(':quizz_id', $quizz_id, PDO::PARAM_INT);
		return DB::tryRunStmtR($stmt);
	}

	# == Setter ==

	private function incNbpartiesDB(int $id)
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

	private function listQuizzDB()
	{
		$stmt = DB::getDB()->prepare("SELECT q.id,
			q.title,
			q.pseudo,
			q.nbparties
		FROM quizzs q
		ORDER BY q.nbparties DESC;");
		return DB::tryRunStmtR($stmt);
	}
}
