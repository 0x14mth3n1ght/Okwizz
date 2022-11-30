<?php
require_once '../models/userManager.php';
require_once '../models/Session.php';
require_once '../models/Utils.php';

Session::redirectLog();

$pseudo = Utils::getPostOrRedirect("pseudo");
$passwd = Utils::getPostOrRedirect("passwd");

if (UserManager::verifyPassword($pseudo, $passwd)) {
	Session::doLogin($pseudo, $passwd);
	Utils::redirect();
}

Utils::redirect('./login.php');
