<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
require_once '../models/UserManager.php';

Session::redirectLog();

$pseudo = Utils::getPostOrRedirect("pseudo");

if (UserManager::verifyPassword($pseudo, "")) {
	Session::doLogin($pseudo);
	Utils::redirect();
}

if (UserManager::registerPlayer($pseudo, "")) {
	Session::doLogin($pseudo);
	Utils::redirect();
}

Utils::redirect('login.php');
