<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/Template.php';
require_once '../models/UserManager.php';

Session::redirectUnLog();

$rating = Utils::getPostOrRedirect("rating"); // always 0
$comment = Utils::getPostOrRedirect("comment");

UserManager::setReview(Session::getPseudo(), $rating, $comment);

Utils::redirect('review.php');
