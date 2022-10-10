<?php
  session_start(); 
  include('../SQL/querries.sql'); 
  // S'il n'y a pas de session alors on ne va pas sur cette page
  if(!isset($_SESSION['id'])){ 
    header('Location: ../index.php'); 
    exit; 
  }
  // On récupère les informations de l'utilisateur connecté
  $afficher_profil = $DB->query("SELECT * 
    FROM utilisateur 
    WHERE id = ?", 
  array($_SESSION['id']));
  
  $afficher_profil = $afficher_profil->fetch(); 
?>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mon profil</title>
        <head>
            <body>
                <h2>Voici le profil de <?= $afficher_profil['name'] ?></h2>
                <div>Quelques informations sur vous : </div>
                <ul>
                    <li>Votre id est : <?= $afficher_profil['id'] ?></li>
                    <li>Votre score maximal est : <?= $afficher_profil['score'] ?></li>
                </ul>
            </body>
</html>