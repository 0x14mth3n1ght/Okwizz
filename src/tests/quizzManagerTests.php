<?php
require_once '../models/db.php';
require_once '../models/quizzManager.php';

class Test
{
	private int $nbtest = 1;
	private int $success = 0;
	private int $failed = 0;

	private function atrue(bool $res)
	{
		if ($res)
			$this->success++;
		else
			$this->failed++;
		echo "<p> test $this->nbtest: ";
		echo $res ? "P" : "F";
		echo "</p>";
		$this->nbtest++;
	}

	private function afalse(bool $res)
	{
		if ($res)
			$this->failed++;
		else
			$this->success++;
		echo "<p> test $this->nbtest: ";
		echo $res ? "F" : "P";
		echo "</p>";
		$this->nbtest++;
	}

	public function run()
	{

		$sql = file_get_contents('../SQL/tables-create.sql');
		DB::getDB()->exec($sql);

		$q1 = new Question("1 + 2 ?", "3", ["1", "2", "4"]);
		$q2 = new Question("2 - 1 ?", "1", ["2", "3", "4"]);
		$q3 = new Question("Ceci est la question ?", "3", ["1", "2", "4"]);
		$q4 = new Question("jsp", "vrai", ["faux", "faux", "faux"]);
		$q5 = new Question("Enfin la dernière question: ", "aleatoire", ["aleatoire", "aleatoire", "aleatoire"]);
		$qz0 = new Quizz("titre", "Xarus", 0);
		$qz0->addQuestion($q1);
		$qz0->addQuestion($q2);
		$qz0->addQuestion($q3);
		$qz0->addQuestion($q4);
		$qz0->addQuestion($q5);

		$qz1 = new Quizz("titre", "Xarus", 1, [$q1, $q2, $q3, $q4, $q5]);
		$qz1->addQuestion($q1);
		$qz1->addQuestion($q2);
		$qz1->addQuestion($q3);
		$qz1->addQuestion($q4);
		$qz1->addQuestion($q5);

		self::atrue(QuizzManager::addQuizz($qz0));
		self::atrue(QuizzManager::getQuizz(1) == $qz0);
		self::atrue(QuizzManager::incNbparties(1));
		self::atrue(QuizzManager::getQuizz(1) == $qz1);
		self::atrue(QuizzManager::listQuizz() == array(
			[
				"id" => 1,
				"title" => "titre",
				"pseudo" => "Xarus",
				"nbparties" => 1
			]
		));

		echo "<p> sucess: $this->success </p>";
		echo "<p> fail: $this->failed </p>";
	}
}

$t = new Test();
$t->run();
