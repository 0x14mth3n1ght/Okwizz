<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
require_once '../models/QuizzManager.php';

Session::redirectUnLog();

$quizzs = QuizzManager::listQuizz();
Template::loadView('community', array('communityQuizz'), array("quizzs" => $quizzs));
