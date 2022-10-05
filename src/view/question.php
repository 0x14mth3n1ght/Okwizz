<!--Page de la premiere question-->
<html>
<body>

<?php
// define variables and set to empty values
$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
}
//fonctionne que si <form action="../view/question.php" method="post"> de la forme
//Name: <input type="text" name="name"><br>
//<input type="submit">

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

Bonjour, <?php echo htmlspecialchars($_POST["name"]); ?>.

<ol>
<li>Combien de jours il y a-t-il dans une semaine? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion1" value="7"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion1" value="4"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion1" value="1"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion1"" value="8"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion1'];
if($answer == "7"){
<<<<<<< HEAD
echo "Well Done !";
=======
echo "Bravo !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
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
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="245"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="365"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="456"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="0"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion2'];
if($answer == "365"){
echo "Bravo !";
}else if($answer != ""){
<<<<<<< HEAD
echo "Wrong !";
=======
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Combien de semaines il y a-t-il dans une année? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion3" value="52"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion3" value="67"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion3" value="34"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion3"" value="89"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion3'];
if($answer == "52"){
<<<<<<< HEAD
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>De quelle couleur est le ciel? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
<<<<<<< HEAD
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="blue"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="red"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="green"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4"" value="yellow"/>
=======
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="bleu"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="rouge"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="vert"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4"" value="jaune"/>
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion4'];
<<<<<<< HEAD
if($answer == "blue"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
if($answer == "bleu"){
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Qui est le président des États-Unis? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
<<<<<<< HEAD
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="obama"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="trump"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="you"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5"" value="willy"/>
=======
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Obama"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Biden"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="Vous"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5"" value="Willy"/>
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion5'];
<<<<<<< HEAD
if($answer == "obama"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
if($answer == "Biden"){
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Combien de côtés possède un triangle? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion6" value="3"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion6" value="5"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion6" value="2"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion6"" value="9"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion6'];
if($answer == "3"){
<<<<<<< HEAD
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Quel est le premier élément du tableau de la classification périodique? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
<<<<<<< HEAD
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="hydrogen"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="iron"/>
=======
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="titane"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="fer"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="hydrogene"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7"" value="cuivre"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion7'];
<<<<<<< HEAD
if($answer == "hydrogen"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
if($answer == "hydrogene"){
echo "Bravo!";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Quelle substance produisent les abeilles? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
<<<<<<< HEAD
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="honey"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="water"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="pollen"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8"" value="fire"/>
=======
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="eau"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="miel"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="pollen"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8"" value="feu"/>
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion8'];
<<<<<<< HEAD
if($answer == "honey"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
if($answer == "miel"){
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
<li>Combien de bandes il y a-t-il dans le drapeau américain?
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion9" value="13"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion9" value="34"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion9" value="12"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion9"" value="42"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion9'];
if($answer == "13"){
<<<<<<< HEAD
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
=======
echo "Bravo !";
}else if($answer != ""){
echo "Mauvaise réponse !";
>>>>>>> dd23575cb3c201af2a9fa9fc9ed66f3163487956
}
?>
</li>
</ol>

<a class="button" href="../public/index.php"><strong>Try Again</strong></a>

</body>
</html>
