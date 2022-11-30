<?php
require_once '../models/userManager.php';
require_once '../models/Session.php';
require_once '../models/Utils.php';

Session::redirectLog();

$pseudo = Utils::getPostOrRedirect("pseudo");
$passwd = Utils::getPostOrRedirect("passwd");
$passwd_verify = Utils::getPostOrRedirect("passwd_verify");

if ($passwd != $passwd_verify)
	Utils::redirect('./register.php');

if (UserManager::registerPlayer($pseudo, $passwd)) {
	Session::doLogin($pseudo, $passwd);
	Utils::redirect();
}

Utils::redirect('./register.php');
