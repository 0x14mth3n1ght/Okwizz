<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/home.css">
</head>
<body>
	<div class="info_box">
		<!-- <label for="name">Pseudo :</label> -->
		<div class="info_title">
			<h2>Règles du jeu</h2>
		</div>

		<div class="info_list">
			<div class="info">1. Répondez aux questions suivantes en cochant les bonnes réponses, puis cliquez sur "valider".</div>
			<div class="info">2. Règle n°2</div>
			<div class="info">3. Règle n°3</div>
			<div class="info">4. Règle n°4</div>
		</div>

		<form action="../view/question.php" method="post">
			<div class="wrapper">
				<div class="input-data">
					<input id="name" name="name" type="text" >
					<div class="underline"></div>
					<label>Pseudo</label>
				</div>
			</div>
				<div class="buttons">
				<button type="submit" class="restart">Confirmer</button>
			</div>

			<div class="buttons">
				<button type="submit" class="restart">JOUER</button>
			</div>
		</form>
	</div>
</body>
</html>
