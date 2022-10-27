<?php
// On import user_manager.php pour pouvoir l'utiliser
require_once 'user_manager.php';

// On crée un object UserManager Pour pourvoir utiliser les fonctions.
$um = new UserManager();

// On appel les fonction publics du usermanager.
$um->registerPlayer("I'am groot", "myS3cur3p@ssw0rd");
?>