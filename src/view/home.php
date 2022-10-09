<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../view/home.css">
	<link rel="stylesheet" href="../view/stylesheet.css">

	<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'> -->
</head>

<body>

	<nav class="navbar">
		<ul class="navbar_list">
			<li class="navbar_listlogo">
				<!-- <a href="#" class="logo">Scrum</a> -->
				<img viewBox="0 0 640 512" width="100" title="scrum" src="/src/images/scrum-logo.png"> </img>
			</li>
			<li class="navbar_listitem"><a href="/src/public/index.php">Home</a></li>
			<li class="navbar_listitem"><a href="h">Jouer</a>
				<ul class="navbar_listitemdrop">
					<li><a href="#">Partie rapide</a></li>
					<li><a href="#">Multijoueurs</a></li>
					<li><a href="#">Catégories</a></li>
				</ul>
			</li>
			<li class="navbar_listitem"><a href="h">Contact</a></li>
			<li class="navbar_listitem"><a href="h">Classement</a></li>
			<li class="navbar_listitem"><a href="h">Profil</a></li>
		</ul>
		<!-- <img src="../view/hamburger-button-icons-menu-bar-line.png" alt="menu hamburger" class="menu-hamburger"> -->
	</nav>


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
</body>

</html>