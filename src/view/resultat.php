<div class="info_box">
	<p> 
		Bonjour, <?php echo htmlspecialchars($_SESSION["name"]);?>
	</p>

	<?php
	require_once '../models/userManager.php';
	$score = $_SESSION["score"];
	$hscore = UserManager::getHighscore($_SESSION["name"]);
	if($score > $hscore)
		UserManager::setHighscore($_SESSION["name"], $score);
		UserManager::incNbparties($_SESSION["name"]);
	?>
	
	<div>
		<p>
			Score: <?php echo $score ?>
		</p>
		<p>
			High Score: <?php echo $hscore ?>
		</p>
	</div>
	

	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
	<form action="../public/classement.php" method="post">
		<div class="buttons">
			<button type="submit">Classement</button>
		</div>
	</form>
</div>
