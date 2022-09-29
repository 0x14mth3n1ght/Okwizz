<?php

/* modeleValidation

   SYNOPSIS : Cette bibliothèque reprend toutes les fonctions de validation de l'application
*/

/* isAlpha : contrôle de chaîne alphabétique
   @author	: nom
   @date	: 04.11.2007
   @version     : 1
*/
function isAlpha($str)
{// 	>((string)str)-(bool)>

return preg_match('/^([a-zA-Z]*)$/',$str);
}//

/* isVisa : contrôle de numéro VISA
   @author 	: nom
   @date	: 04.11.2007
   @version     : 2
*/
function isVisa($str)
{//	>((string)str)-(bool)>

return preg_match('/^(4)([0-9]{15})$/',$str);
}//

/* DEPRECIEE - isVisa : contrôle de numéro VISA
   @author 	: nom
   @date	: 07.05.2006
   @version     : 1
function isVisa($str)
{//	>((string)str)-(bool)>

return preg_match('/^([0-9]{16})$/',$str);
}//
*/

?>