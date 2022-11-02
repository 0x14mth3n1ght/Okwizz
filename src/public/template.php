<?php
include_once '../models/error.php';

function loadView($view, $styles, $data){
	?>
	<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Scrum gang</title>
		<link rel="icon" type="image/png" href="../images/scrum-logo.png">
		<link rel="stylesheet" href="../view/global.css">
		<link rel="stylesheet" href="../view/header.css">
		<link rel="stylesheet" href="../view/footer.css">
		<?php foreach($styles as $style){ ?>
			<link rel="stylesheet" href=<?php echo "../view/$style.css" ?>>
		<?php } ?>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	</head>
	<body>
			<header>
				<?php include_once '../view/header.php' ?>
			</header>
			<div class="main-container">
				<?php require_once "../view/$view.php" ?>
			</div>
			<footer>
				<?php include_once '../view/footer.php' ?>
			</footer>
	</body>
	</html>
	<?php
}
?>