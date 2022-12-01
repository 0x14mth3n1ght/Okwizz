<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';

Session::redirectUnLog();
$category = Utils::getPostOrRedirect("category");

// chose a random category
if ($category == 0)
	$category = rand(9, 33);
Session::setVar("quizz/category", $category);

if ($category != -1) {
	Utils::redirect("difficulty.php");
} else {
	Utils::redirect("community.php");
}
