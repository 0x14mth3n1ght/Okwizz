<!DOCTYPE html>
<html>

<!-- <head>
	<link rel="stylesheet" href="../view/home.css">
</head> -->

<body>
	<?php
	$info = $_SESSION['questions'][$_SESSION["question_id"]];
	if ($data["choix"] == $info["correct_awnser"]) {
		$_SESSION["score"]++;
	}
	?>
	<div class="info_box">
		<p> Bonjour, <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
		<div class="info_title">
			<p><?php echo $info["question"]; ?></p>
		</div>
		<?php
		if (isset($data['choix'])) {
		?>
			<div class="info_list">
				<?php
				foreach ($info["awnsers"] as $a) {
				?>
					<div class="info">
						<?php
						if ($a == $info["correct_awnser"]) {
						?>
							<span class="green">
								<?php echo "✔"; ?>
							</span>
						<?php
						} else {
						?>
							<span class="red">
								<?php echo "✗"; ?>
							</span>
						<?php
						}
						?>
						<span> <?php echo $a; ?> </span>
					</div>
				<?php
				}
				?>
			</div>
			<div class="info_title">
				<?php
				if ($data["choix"] == $info["correct_awnser"]) {
					echo "Bravo !";
				} else {
					echo "Mauvaise réponse! Désolé. La bonne réponse est: " . $info["correct_awnser"];
				}
				$_SESSION["question_id"]++;
				?>
			</div>
			<form action="../public/questionController.php" method="post">
				<div class="buttons">
					<button type="submit"> Question suivante </button>
				</div>
			</form>
		<?php
		} else {
		?>
			<form action="../public/questionController.php" method="post">
				<div class="info_list">
					<?php
					foreach ($info["awnsers"] as $a) {
					?>
						<div class="info">
							<input type="radio" id="<?php echo $a; ?>" name="choix" value="<?php echo $a; ?>" required>
							<label for="<?php echo $a; ?>"><?php echo $a; ?></label>
						</div>
					<?php
					}
					?>
				</div>
				<?php
				if (!isset($data['choix'])) {
				?>
					<div class="buttons">
						<button type="submit">Envoyer la réponse</button>
					</div>
				<?php
				}
				?>
			</form>
		<?php
		}
		?>
		<form action="../public/index.php" method="post">
			<div class="buttons">
				<button type="submit"> Main Menu </button>
			</div>
		</form>
	</div>
</body>

</html>