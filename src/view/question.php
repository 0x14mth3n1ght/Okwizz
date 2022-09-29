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