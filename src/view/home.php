<!--Page principale-->

	<form action="../view/question.php" method="post">
			<button type="submit" class="restart">JOUER</button>
	</form>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="pseudo.css">
</head>
<body>

	<h1>LEAGUE OF SCRUM</h1>
	<p>Pseudo page</p>

	<div class="info_box">
		<!-- <label for="name">Pseudo :</label> -->
		<div class="info_title">
			<h2>Règles du jeu</h2>
		</div>

		<div class="info_list">
			<div class="info"> 1. Répondez aux questions suivantes en cochant les 
				bonnes réponses, puis cliquez sur "valider".</div>
			<div class="info">2. Règle n°2</div>
			<div class="info">3. Règle n°3</div>
			<div class="info">4. Règle n°4</div>
		</div>

		<div class="wrapper">
			<div class="input-data">
				<input id="name" name="name" type="text" required>
				<div class="underline"></div>
				<label>Pseudo</label>
			</div>
		</div>
		<!-- <input type="text" id="name" name="name" required
                    size="10"> -->


		<div class="buttons">
			<button class="quit">Validate</button>
			<!-- <button class="restart">Start Quiz</button> -->
		</div>

	</div>

</body>
</html>
