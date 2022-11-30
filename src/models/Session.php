<?php
require_once 'Utils.php';

class Session
{
	public static function runSession()
	{
		if (session_status() != PHP_SESSION_ACTIVE)
			session_start();
	}

	public static function isLog()
	{
		self::runSession();
		return isset($_SESSION["user/login"]) && $_SESSION["user/login"];
	}

	# == PSEUDO ==

	public static function getPseudo()
	{
		self::runSession();
		if (!isset($_SESSION["user/pseudo"]))
			throw new Exception("Not Login");
		return htmlspecialchars($_SESSION["user/pseudo"]);
	}

	public static function doLogin(string $pseudo)
	{
		self::runSession();
		$_SESSION["user/login"] = true;
		$_SESSION["user/pseudo"] = $pseudo;
		error_log("Login as: " . $pseudo);
	}

	# == REDIRECT LOGING ==

	public static function redirectLog(string $location = Utils::INDEX)
	{
		if (self::isLog())
			Utils::redirect($location);
	}

	public static function redirectUnLog(string $location = Utils::INDEX)
	{
		if (self::isLog())
			Utils::redirect($location);
	}
}
