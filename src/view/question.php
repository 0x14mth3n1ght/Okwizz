<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/stylesheet.css">
</head>
<body>

<?php
session_start();
extract($_POST);
# if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($name))
	$_SESSION["name"] = $name;
?>

Bonjour, <?php echo htmlspecialchars($_SESSION["name"]); ?>.

<ol>
		<li>Combien de jours il y a-t-il dans une semaine?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion1" value="7" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion1" value="4" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion1" value="1" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion1" value="8" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion1'];
if($answer == "7"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse!";
}else{
	echo $answer;
}
?>
</li>
		<li>Combien de jours il y a-t-il dans une année?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion2" value="245" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion2" value="365" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion2" value="456" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion2" value="0" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion2'];
if($answer == "365"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Combien de semaines il y a-t-il dans une année?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion3" value="52" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion3" value="67" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion3" value="34" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion3" " value="89" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion3'];
if($answer == "52"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>De quelle couleur est le ciel?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion4" value="bleu" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion4" value="rouge" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion4" value="vert" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion4" " value="jaune" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion4'];
if($answer == "bleu"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Qui est le président des États-Unis?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Obama" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Biden" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Vous" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion5" " value="Willy" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion5'];
if($answer == "Biden"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Combien de côtés possède un triangle?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion6" value="3" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion6" value="5" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion6" value="2" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion6" " value="9" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion6'];
if($answer == "3"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Quel est le premier élément du tableau de la classification périodique?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion7" value="titane" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion7" value="fer" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion7" value="hydrogene" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion7" " value="cuivre" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion7'];
if($answer == "hydrogene"){
	echo "Bravo!";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Quelle substance produisent les abeilles?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion8" value="eau" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion8" value="miel" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion8" value="pollen" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion8" " value="feu" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion8'];
if($answer == "miel"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
		<li>Combien de bandes il y a-t-il dans le drapeau américain?
			<div class="AnswerPanel">
				<form action="../view/question.php" method="post">
					<input class="AnswerButton" type="submit" name="AnswerQuestion9" value="13" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion9" value="34" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion9" value="12" />
					<input class="AnswerButton" type="submit" name="AnswerQuestion9" " value="42" />
				</form>
			</div>
<?php
$answer = $_POST['AnswerQuestion9'];
if($answer == "13"){
	echo "Bravo !";
}else if($answer != ""){
	echo "Mauvaise réponse !";
}
?>
</li>
	</ol>

	<a class="button" href="../public/index.php">
		<strong>Try Again</strong>
	</a>

</body>
</html>
