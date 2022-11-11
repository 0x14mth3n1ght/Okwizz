<!DOCTYPE html>
<html>
<body>
	<div class="info_box">
		<p> Bonjour <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
		<div class="info_title">
			<p><?php echo $data['info_question']["question"]; ?></p>
		</div>
		<?php
		if (isset($data['choix'])) {
		?>
			<div class="info_list">
				<?php
				foreach ($data['info_question']["answers"] as $a) {
				?>
					<div class="info">
						<?php
						if ($a == $data['info_question']["correct_answer"]) {
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
				if ($data["choix"] == $data['info_question']["correct_answer"]) {
					echo "Bravo !";
				} else {
					echo "Mauvaise réponse! Désolé. La bonne réponse est: " . $data['info_question']["correct_answer"];
				}
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
			<!-- load le script chrono -->
			<h1 id="chrono"></h1>
			<script>
				//Temps initial : 30s
				var temps = 30;
				const timerElement = document.getElementById("chrono");

				//Décrémente temps
				function diminuerTemps() {
					if (temps < 10) temps = "0" + temps;
					timerElement.innerText = temps;
					if (temps <= 0) {
						temps = 0;
						timerElement.innerText = "Time's up !";
					} else temps--;
				}

				//Démarre le timer.
				function start_timer() {
					setInterval(diminuerTemps, 1000); //appelle diminuerTemps toutes les secondes.
				}

				//Timer line
				/*
				function startTimerLine (){
					counterLine = setInterval (timer, 29);
					var time = 0;
					function timer (){
						time += 1;
						startTimerLine.style.width = time + "px";
						if (time > 549) clearInterval (counterLine);
					}
				}*/

				start_timer();
				//startTimerLine();
			</script>
			<form action="../public/questionController.php" method="post">
				<div class="info_list">
					<?php
					foreach ($data['info_question']["answers"] as $a) {
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