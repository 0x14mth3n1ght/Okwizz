<!--Page de la premiere question-->
<?php
//récupération des données simples
echo $_POST['titre'].'';
echo $_POST['name'].'';
//récupération des cases à coché
if(isset($_POST['restart']))// si la case Start Quiz est cochée, c'est que le formulaire a envoyé quelque chose
{
  echo $_POST['restart'];
}
else
{
  echo "Quit";
}
?>


<div class="AnswerPanel">
		<form action="../view/question.php" method="post">
      <button class="AnswerButton" type="submit">Answer 1</button>
      <button class="AnswerButton" type="submit">Answer 2</button>
      <button class="AnswerButton" type="submit">Answer 3</button>
      <button class="AnswerButton" type="submit">Answer 4</button>
		</form>
</div>

