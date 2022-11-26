<?php
require_once 'template.php';
require_once '../models/userManager.php';
session_start();
$Reviews=UserManager::getAllUserReview();
$name = $_POST["name"];
$rating = $_POST["rating"];
$comment = $_POST["comment"];
UserManager::setReview($name, $rating, $comment);
loadview('review', array('review'),$Reviews);
?>
