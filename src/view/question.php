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

<form method="post" action="trivia2.php">
<ol>
<li>How many days are in a week? <input type="text" name="daysweek"></li>
<li>How many days are in a year? <input type="text" name="daysyear"></li>
<li>How many weeks are in a year? <input type="text" name="weeksyear"></li>
<li>What color is the sky? <input type="text" name="colorsky"></li>
<li>what is us president name? <input type="text" name="presidentname"></li>
<li>How many sides does a triangle have? <input type="text" name="sidestriange"></li>
<li>What is the first element on the periodic table of elements? <input type="text" name="firstelement"></li>
<li>Bees create what sweet substance? <input type="text" name="beesubstance"></li>
<li>How many stripes are displayed on the American flag?<input type="text" name="stripes"></li>
</ol>
<input type="submit" value="Done!"/>
</form>
<?php
$daysweek=$_POST['daysweek'];
$daysyear=$_POST['daysyear'];
$weeksyear=$_POST['weeksyear'];
$colorsky=$_POST['colorsky'];
$presidentname=$_POST['presidentname'];
$sidestriangle=$_POST['sidestriange'];
$firstelement=$_POST['firstelement'];
$beesubstance=$_POST['beesubstance'];
$stripes=$_POST['stripes'];
$wrong=0;
if($daysweek==7){
echo "1. you got the right answer: $daysweek<br/>";
}else {
    $wrong++;
    echo "number 1 is wrong<br/>";}

if($daysyear==365){
echo "2. you got the right answer: $daysyear<br/>";
}else {
    $wrong++;
    echo "number 2 is wrong<br/>";}

if($weeksyear==52){
echo "3. you got the right answer: $weeksyear<br/>";
}else {
    $wrong++;
    echo "number 3 is wrong<br/>";}

if($colorsky=='blue'){
echo "4. you got the right answer: $colorsky<br/>";
}else {
    $wrong++;
    echo "number 4 is wrong<br/>";}

if($presidentname=='obama'){
echo "5. you got the right answer: $presidentname</br>";
}else {
    $wrong++;
    echo "number 5 is wrong<br/>";}

if($sidestriangle==3){
echo "6. you got the right answer: $sidestriangle</br>";
}else {
    $wrong++;
    echo "number 6 is wrong<br/>";}

if($firstelement=='hydrogen'){
echo "7. you got the right answer: $firstelement<br/>";
}else {
    $wrong++;
    echo "number 7 is wrong<br/>";}

if($beesubstance=='honey'){
echo "8. you got the right answer: $beesubstance<br/>";
}else {
    $wrong++;
    echo "number 8 is wrong<br/>";}

if($stripes==13){
echo "9. you got the right answer: $stripes<br/>";
}else {
    $wrong++;
    echo "number 9 is wrong<br/>";}
echo "<h3>You have $wrong wrong answers</h3>";
?>


<a class="button" href="home.php"><strong>Try Again</strong></a>

</body>
</html>
