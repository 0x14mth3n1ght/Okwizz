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

Hello, <?php echo htmlspecialchars($_POST["name"]); ?>.

<li>How many days are in a week? 
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
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}else{
  echo $answer;
}
?>
</li>
<li>How many days are in a year? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="245"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="367"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="456"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion2" value="0"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion2'];
if($answer == "367"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>How many weeks are in a year? 
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
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>What color is the sky? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="blue"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="red"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4" value="green"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion4"" value="yellow"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion4'];
if($answer == "blue"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>what is us president name? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="obama"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="trump"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5" value="you"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion5"" value="willy"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion5'];
if($answer == "obama"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>How many sides does a triangle have? 
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
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>What is the first element on the periodic table of elements? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="hydrogen"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="iron"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7" value="titane"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion7"" value="cuivre"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion7'];
if($answer == "hydrogen"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>Bees create what sweet substance? 
<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="honey"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="water"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8" value="pollen"/>
      <input class="AnswerButton" type="submit" name="AnswerQuestion8"" value="fire"/>
		</form>
</div>
<?php
$answer=$_POST['AnswerQuestion8'];
if($answer == "honey"){
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
<li>How many stripes are displayed on the American flag?
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
echo "Well Done !";
}else if($answer != ""){
echo "Wrong !";
}
?>
</li>
</ol>

<a class="button" href="home.php"><strong>Try Again</strong></a>

</body>
</html>
