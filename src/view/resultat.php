<div class="info_box">
	<p> 
		Bonjour,<?php echo htmlspecialchars($_SESSION["name"]);?> :<?php echo $_SESSION["score"];?> pts. 
	</p>

	<?php
	require_once '../models/userManager.php';
	$hscore = UserManager::getHighscore($_SESSION["name"]);
	if($_SESSION["score"] > $hscore)
		UserManager::setHighscore($_SESSION["name"], $hscore);
	?>

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
