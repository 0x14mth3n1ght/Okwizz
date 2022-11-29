<?php
require_once 'template.php';
require_once '../models/userManager.php';
session_start();
$Reviews=UserManager::getAllUserReview();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$rating = $_POST["rating"];
	$comment = $_POST["comment"];
	UserManager::setReview($name, $rating, $comment);
}
loadview('review', array('review'),$Reviews);
?>
