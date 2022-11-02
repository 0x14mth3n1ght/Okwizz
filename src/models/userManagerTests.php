<?php
require_once 'db.php';
require_once 'userManager.php';

$GLOBALS["nbtest"] = 1;

function assertt(bool $res){
	$nbtest = $GLOBALS["nbtest"];
	echo "<p> test $nbtest: ";
	echo $res ? "P" : "F";
	echo "</p>";
	$GLOBALS["nbtest"]++;
}

function assertf(bool $res){
	$nbtest = $GLOBALS["nbtest"];
	echo "<p> test $nbtest: ";
	echo $res ? "F" : "P";
	echo "</p>";
	$GLOBALS["nbtest"]++;
}

/**
 * Recreate the Database if it already exist.
 * @var Ambiguous $sql
 */
$sql = file_get_contents('../SQL/tables-create.sql');
DB::getDB()->exec($sql);

assertt(UserManager::registerPlayer("Xarus", "test123"));
assertf(UserManager::registerPlayer("Xarus", "test123"));

assertt(UserManager::verifyPassword("Xarus", "test123"));
assertf(UserManager::verifyPassword("Xarus", "qdslkjfh"));
assertf(UserManager::verifyPassword("qsdf", "123"));

assertt(UserManager::getHighscore("Xarus") == 0);
assertf(UserManager::getHighscore("qsdf"));

assertt(UserManager::setPassword("Xarus", "test456"));
assertf(UserManager::verifyPassword("Xarus", "test123"));
assertt(UserManager::verifyPassword("Xarus", "test456"));
assertf(UserManager::setPassword("test", "123"));

assertt(UserManager::setHighscore("Xarus", 123));
assertf(UserManager::setHighscore("Xarus", -123));
assertf(UserManager::setHighscore("test", 123));

assertt(UserManager::deletePlayer("Xarus"));
assertf(UserManager::deletePlayer("test"));

assertt(UserManager::getAllUserHightscore() == array());
UserManager::registerPlayer("Xarus1", "test123");
UserManager::setHighscore("Xarus1", 123);
UserManager::registerPlayer("Xarus2", "test123");
UserManager::setHighscore("Xarus2", 56);
assertt(UserManager::getAllUserHightscore() == array(
		[
				"pseudo" => "Xarus1",
				"highscore" => 123
		],
		[
				"pseudo" => "Xarus2",
				"highscore" => 56
		]
));

?>