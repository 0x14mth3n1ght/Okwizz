<?php
include_once '../models/error.php';
require_once '../models/Utils.php';
require_once '../models/Session.php';

class Template
{
	public static function loadViewIfConnected($view, $styles, $data)
	{
		if (Session::isLogin())
			self::loadView($view, $styles, $data);
		else
			Utils::redirect('login.php');
	}

	public static function loadView($view, $styles, $data)
	{
?>
		<!doctype html>
		<html lang="fr">

		<head>
			<meta charset="utf-8">
			<title>Scrum gang</title>
			<link rel="icon" type="image/png" href="../images/scrum-logo.png">
			<link rel="stylesheet" href="../style/global.css">
			<link rel="stylesheet" href="../style/header.css">
			<link rel="stylesheet" href="../style/footer.css">
			<?php foreach ($styles as $style) { ?>
				<link rel="stylesheet" href=<?php echo "../style/$style.css" ?>>
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
}
?>