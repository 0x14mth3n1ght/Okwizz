<?php
extract($data);
?>

<div class="info_box">
	<p> Bonjour <?php echo htmlentities($pseudo); ?>: <?php echo $score; ?>pts. </p>
	<div class="info_title">
		<p><?php echo htmlentities($question->getQuestion()); ?></p>
	</div>
	<h1 id="chrono"></h1>
	<script src="../script/chrono.js"></script>
	<form action="awnser.php" method="post">
		<div class="info_list">
			<?php
			$awnsers = $question->getAllAwnsers();
			for ($i = 0; $i < count($awnsers); ++$i) {
				$a = htmlentities($awnsers[$i]);
			?>
				<div class="info">
					<input type="radio" id="choix_<?php echo $i; ?>" name="choix" value="<?php echo $i; ?>" required>
					<label for="choix_<?php echo $i; ?>"><?php echo $a; ?></label>
				</div>
			<?php
			}
			?>
		</div>
		<div class="buttons">
			<button type="submit">Send the Awnser</button>
		</div>
	</form>
	<form action="index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
</div>