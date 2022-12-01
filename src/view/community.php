<?php
extract($data);
?>
<h1>Community Quizz</h1>
<form class="container" action="_community.php" method="post">
	<ol>
		<?php
		foreach ($quizzs as $q) {
		?>
			<li>
				<button type="submit" name="quizz_id" value="<?php echo $q["quizz_id"]; ?>">
					<p class="title"><?php echo htmlentities($q["title"]); ?></p>
					<div class="info">
						<p class="pseudo">Pseudo : <?php echo htmlentities($q["pseudo"]); ?></p>
						<p class="nbparties">Party Played : <?php echo htmlentities($q["nbparties"]); ?></p>
					</div>
				</button>
			</li>
		<?php
		}
		?>
	</ol>
</form>