<?php
extract($data);
?>

<div class="info_box">
	<p> Bonjour <?php echo htmlentities($pseudo); ?>: <?php echo htmlentities($score); ?>pts. </p>
	<div class="info_title">
		<p><?php echo htmlentities($question->getQuestion()); ?></p>
	</div>
	<div class="info_list">
		<?php
		$awnsers = $question->getAllAwnsers();
		for ($i = 0; $i < count($awnsers); ++$i) {
			$a = htmlentities($awnsers[$i]);
		?>
			<div class="info">
				<?php
				if ($i == $question->getCorrectAwnserPosition()) {
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
		if ($choix == $question->getCorrectAwnserPosition()) {
			echo "Bravo !";
		} else {
			echo "Mauvaise réponse! Désolé. La bonne réponse est: " . $question->getCorrectAwnser();
		}
		?>
	</div>
	<form action="question.php" method="post">
		<div class="buttons">
			<button type="submit">Question suivante</button>
		</div>
	</form>
	<form action="index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
</div>