<?php
include_once '../models/error.php';

/** Vue commune à toute les page.
 1 - on génère le doctype et les headers
 2 - on charge l'en-tête
 3 - on charge la bonne page (donnée par $view) 
 4 - on charge le pied de  page

 $db et $data sont respectivement la liaison avec la base de donée 
 et les données à traiter
 */
function loadView($view, $data)
{
?>
	<!doctype html>
	<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Scrum gang</title>
		<link rel="stylesheet" href="../view/home.css">
	</head>

	<body>
		<?php include_once '../view/header.php' ?>
		<div class="main-container">
			<?php include_once "../view/$view" ?>
		</div>
	</body>

	</html>
<?php
}
?>