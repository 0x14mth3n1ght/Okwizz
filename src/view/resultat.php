<div class="info_box">
	<p>
		Hi , <?php echo htmlspecialchars($_SESSION["name"]); ?> !
	</p>

	<?php
	require_once '../models/userManager.php';
	require_once '../models/quizzManager.php';
	$score = $_SESSION["score"];
	$hscore = UserManager::getHighscore($_SESSION["name"]);
	if ($score > $hscore)
		UserManager::setHighscore($_SESSION["name"], $score);
	UserManager::incNbparties($_SESSION["name"]);
	if (isset($_SESSION["quizz_id"])) {
		QuizzManager::incNbparties($_SESSION["quizz_id"]);
	}
	?>

	<div>
		<p>
			Your score: <?php echo $score ?>
		</p>
		<p>
			Your highest Score: <?php echo $hscore ?>
		</p>
	</div>


	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
	<form action="../public/classement.php" method="post">
		<div class="buttons">
			<button type="submit">Ranking</button>
		</div>
	</form>
</div>
