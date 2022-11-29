<h1>Community Quizz</h1>
<form class="container" action="../public/questionController.php" method="post">
	<input type="hidden" name="name" value="<?php echo $data["name"]; ?>">
	<ol>
		<?php
		for ($i = 0; $i < count($data["quizzList"]); $i++) {
		?>
			<li>
				<button type="submit" name="quizz_id" value="<?php echo $data["quizzList"][$i]["quizz_id"]; ?>">
				<p class="title"><?php echo $data["quizzList"][$i]["title"]; ?></p>
				<div class="info">
					<p class="pseudo">Pseudo : <?php echo $data["quizzList"][$i]["pseudo"]; ?></p>
					<p class="nbparties">Player Count : <?php echo $data["quizzList"][$i]["nbparties"]; ?></p>
				</div>
				</button>
			</li>
		<?php } ?>
	</ol>
</form>