<nav class="navbar">
	<ul class="navbar_list">
		<li class="navbar_listlogo"><img width="100" title="scrum" src="../images/logo_okwizz-removebg.png"></li>
		<?php
		require_once '../models/Session.php';
		require_once '../models/Utils.php';
		if (Session::isLog()) {
			$pseudo_d = Session::getPseudo();
		?>
			<li class="navbar_listitem">(<?php echo $pseudo_d ?>)</li>
		<?php
		}
		?>
		<li class="navbar_listitem"><a href="../public/index.php">Home</a></li>
		<li class="navbar_listitem"><a href="h">Game</a>
			<ul class="navbar_listitemdrop">
				<li><a href="../public/questionController.php">Fast game</a></li>
				<li><a href="../public/catalogueQuizz.php">Categories</a></li>
				<li><a href="../public/sendQuizz.php">Send your quizz</a></li>
				<li><a href="../public/review.php">Review</a></li>
			</ul>
		</li>
		<li class="navbar_listitem"><a href="../public/classement.php">Ranking</a></li>
		<li class="navbar_listitem"><a href="../public/contact.php">Contact</a></li>
		<li class="navbar_listitem"><a href="../public/profil.php">Profil</a></li>
		<li class="navbar_listitem"><a href="../public/login.php">Login</a></li>
		<li class="navbar_listitem"><a href="../public/register.php">Register</a></li>
	</ul>
</nav>