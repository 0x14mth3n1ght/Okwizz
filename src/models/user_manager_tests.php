<?php
require_once 'user_manager.php';

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

$um = new UserManager();

assertt($um->registerPlayer("Xarus", "test123"));
assertf($um->registerPlayer("Xarus", "test123"));

assertt($um->verifyPassword("Xarus", "test123"));
assertf($um->verifyPassword("Xarus", "qdslkjfh"));
assertf($um->verifyPassword("qsdf", "123"));

assertt($um->getHighscore("Xarus") == 0);
assertf($um->getHighscore("qsdf"));

assertt($um->setPassword("Xarus", "test456"));
assertf($um->verifyPassword("Xarus", "test123"));
assertt($um->verifyPassword("Xarus", "test456"));
assertf($um->setPassword("test", "123"));

assertt($um->setHighscore("Xarus", 123));
assertf($um->setHighscore("Xarus", -123));
assertf($um->setHighscore("test", 123));

assertt($um->deletePlayer("Xarus"));
assertf($um->deletePlayer("test"));

assertt($um->getAllUserHightscore() == array());
$um->registerPlayer("Xarus1", "test123");
$um->setHighscore("Xarus1", 123);
$um->registerPlayer("Xarus2", "test123");
$um->setHighscore("Xarus2", 56);
assertt($um->getAllUserHightscore() == array(
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