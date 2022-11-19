<?php
require_once 'db.php';
require_once 'userManager.php';

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

		//constructor - 0
		self::atrue(UserManager::registerPlayer("Xarus", "test123"));
		self::afalse(UserManager::registerPlayer("Xarus", "test123"));
		//destructor
		self::atrue(UserManager::deletePlayer("Xarus"));
		self::afalse(UserManager::deletePlayer("test"));

		//setup - 4
		UserManager::registerPlayer("Xarus", "test123");
		//password - get
		self::atrue(UserManager::verifyPassword("Xarus", "test123"));
		self::afalse(UserManager::verifyPassword("Xarus", "qdslkjfh"));
		self::afalse(UserManager::verifyPassword("qsdf", "123"));
		//password - set
		self::atrue(UserManager::setPassword("Xarus", "test456"));
		self::afalse(UserManager::verifyPassword("Xarus", "test123"));
		self::atrue(UserManager::verifyPassword("Xarus", "test456"));
		self::afalse(UserManager::setPassword("test", "123"));

		//highscore - get - 11
		self::atrue(UserManager::getHighscore("Xarus") == 0);
		self::afalse(UserManager::getHighscore("qsdf"));
		//highscore - set
		self::atrue(UserManager::setHighscore("Xarus", 123));
		self::afalse(UserManager::setHighscore("Xarus", -123));
		self::afalse(UserManager::setHighscore("test", 123));
		self::atrue(UserManager::getHighscore("Xarus") == 123);

		//nbparties - get - 17
		self::atrue(UserManager::getNbparties("Xarus") == 0);
		self::afalse(UserManager::getNbparties("qsdf"));
		//nbparties - set
		self::afalse(UserManager::incNbparties("zert"));
		self::atrue(UserManager::incNbparties("Xarus"));
		self::atrue(UserManager::incNbparties("Xarus"));
		self::atrue(UserManager::getNbparties("Xarus") == 2);

		//review - get - 23
		self::afalse(UserManager::getReview("Xarus"));
		self::afalse(UserManager::getReview("test"));
		//review - set
		self::atrue(UserManager::setReview("Xarus", 3, "test"));
		self::afalse(UserManager::setReview("Xarus", -1, "test"));
		self::afalse(UserManager::setReview("Xarus", 7, "test"));
		self::afalse(UserManager::setReview("test", 3, "test"));
		self::atrue(UserManager::getReview("Xarus") == array("appscore" => 3, "review" => "test"));


		//setup
		UserManager::deletePlayer("Xarus");
		//getAllUserHighscore
		self::atrue(UserManager::getAllUserHighscore() == array());
		//getAllUserReview
		self::atrue(UserManager::getAllUserReview() == array());

		//setup
		UserManager::registerPlayer("Xarus1", "test123");
		UserManager::setHighscore("Xarus1", 123);
		UserManager::incNbparties("Xarus1");
		UserManager::incNbparties("Xarus1");
		UserManager::incNbparties("Xarus1");
		UserManager::registerPlayer("Xarus2", "test123");
		UserManager::setHighscore("Xarus2", 56);
		UserManager::incNbparties("Xarus2");
		UserManager::incNbparties("Xarus2");

		UserManager::setReview("Xarus1", 4, "genial");


		//getAllUserHighscore
		self::atrue(UserManager::getAllUserHighscore() == array(
			[
				"pseudo" => "Xarus1",
				"highscore" => 123,
				"nbparties" => 3
			],
			[
				"pseudo" => "Xarus2",
				"highscore" => 56,
				"nbparties" => 2
			]
		));

		//getAllUserReview
		self::atrue(UserManager::getAllUserReview() == array(
			[
				"pseudo" => "Xarus1",
				"appscore" => 4,
				"review" => "genial"
			]
		));


		echo "<p> sucess: $this->success </p>";
		echo "<p> fail: $this->failed </p>";
	}
}

$t = new Test();
$t->run();
