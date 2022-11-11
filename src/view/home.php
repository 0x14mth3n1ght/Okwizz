<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="footer.css">
	<link rel="stylesheet" href="stylesheet.css">

	<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'> -->
</head>

<body>

	<?php
	$title = 'Home';
	$page = 'home';
	?>

	<div class="info_box">
		<!-- <label for="name">Pseudo :</label> -->
		<div class="info_title">
			<h2>Règles du jeu</h2>
		</div>

		<div class="info_list">
			<div class="info">1. Répondez aux questions suivantes en cochant les bonnes réponses, puis cliquez sur "valider".</div>
			<div class="info">2. Vous avez 30 secondes pour répondre à chaque question</div>
			<div class="info">3. Plus vous répondez vite, plus vous gagnez de points !</div>
			<!-- <div class="info">4. Règle n°4</div> -->
		</div>

		<form action="../public/questionController.php" method="post">
			<div class="wrapper">
				<div class="input-data">
					<input id="name" name="name" type="text">
					<div class="underline"></div>
					<label>Pseudo</label>
					<!-- </div> -->
				</div>
			</div>
			<div class="buttons">
				<button type="submit" class="restart">Confirmer</button>
				<button type="submit" class="restart">JOUER</button>
			</div>
		</form>
	</div>

	<?php
	?>

</body>

</html>