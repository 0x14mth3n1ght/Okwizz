<?php

/* controlAffichage

   SYNOPSIS : Cette page reprend tous les contrôles pour gérer l'affichage
*/

# INIT
require_once "./Modele/modeleValidation.inc.php";

// var de contrôle de données saisies
$checkSum=3;

# CONTROL
if($_POST)
{
  if(!isAlpha($_POST['iNom']))
  {
    $value['user']['nom'] = $_POST['iNom'];
    $msg['error']['nom']='nom invalide !';
    @$checkSum--;
  }
  if(!isAlpha($_POST['iPrenom']))
  {
    $value['user']['prenom'] = $_POST['iPrenom'];
    $msg['error']['prenom']='prenom invalide !';
    @$checkSum--;
  }
  if(!isVisa($_POST['iVisa']))
  {
    $value['user']['visa'] = $_POST['iVisa'];
    $msg['error']['visa']='visa invalide !';
    @$checkSum--;
  }
}
 
# CHOIX DE L'OUTPUT
//if(!$checkSum)
if($checkSum==3)
{// formulaire validé
  //$page['container']['main'] = 'Formulaire valide';
  $msg['error']['alert'] = 'Formulaire valide';
}
else
{// formulaire invalide
  //$page['container']['main'] = $page['container']['visa'].'<p> Formulaire invalide !</p>';*/
  $msg['error']['alert'] = $page['container']['visa']
    .'<p> Formulaire invalide !</p>';
}

?>
