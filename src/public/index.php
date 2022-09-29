<?php
/*** page principale de l'application  */   
/**     mise en place des remontées d'erreur dans la page web    
 * À retirer IMPÉRATIVEMENT lors de la mise en production  */ 
error_reporting(E_ALL); ini_set('display_errors', 1);  
/* connection à la base de données    
	
/* mise en place du template */ 
	
include_once '../public/template.php';  
loadView('home.php',array()); 
/** fin du model pour la page principale */ 
?>
