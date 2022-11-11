<div class="info_box">
	<p> Bonjour <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
	<div class="info_title">
		<p><?php echo $data['info_question']["question"]; ?></p>
	</div>
	<div class="info_list">
		<?php
		foreach($data['info_question']["answers"] as $a){
			?>
			<div class="info">
				<?php
				if($a == $data['info_question']["correct_answer"]){
					?>
					<span class="green">
						<?php echo "✔"; ?>
					</span>
					<?php
				}else{
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
		if($data["choix"] == $data['info_question']["correct_answer"]){
			echo "Bravo !";
		}else{
			echo "Mauvaise réponse! Désolé. La bonne réponse est: ".$data['info_question']["correct_answer"];
		}
		?>
	</div>
	<form action="../public/questionController.php" method="post">
		<div class="buttons">
			<button type="submit">Question suivante</button>
		</div>
	</form>
	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
</div>