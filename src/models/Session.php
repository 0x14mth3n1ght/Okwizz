<?php
require_once 'Utils.php';

class Session
{

	# == Login ==

	public static function runSession()
	{
		if (session_status() != PHP_SESSION_ACTIVE)
			session_start();
	}

	public static function isLogin()
	{
		return isset($_SESSION["user/login"]) && $_SESSION["user/login"];
	}

	public static function doLogin(string $pseudo)
	{
		$_SESSION["user/login"] = true;
		$_SESSION["user/pseudo"] = $pseudo;
	}

	public static function doUnLog()
	{
		$_SESSION["user/login"] = false;
		unset($_SESSION["user/pseudo"]);
	}

	public static function failNotLogin()
	{
		if (!self::isLogin())
			throw new Exception("Not Login");
	}

	# == REDIRECT ==

	public static function redirectLog(string $location = Utils::INDEX)
	{
		if (self::isLogin())
			Utils::redirect($location);
	}

	public static function redirectUnLog(string $location = Utils::LOGIN)
	{
		if (!self::isLogin())
			Utils::redirect($location);
	}

	# == PSEUDO ==

	public static function getPseudo()
	{
		self::failNotLogin();
		return $_SESSION["user/pseudo"];
	}

	# == get/set ==

	public static function isSet(string $name)
	{
		self::failNotLogin();
		return isset($_SESSION["user/score"]);
	}

	public static function isVar(string $name)
	{
		self::failNotLogin();
		return isset($_SESSION["data/" . $name]) && $_SESSION["data/" . $name];
	}

	public static function getVar(string $name, bool $is_object = false)
	{
		self::failNotLogin();
		if (!isset($_SESSION["data/" . $name]))
			throw new Exception("No Session Variable: " . $name);
		$val = $_SESSION["data/" . $name];
		if ($is_object)
			$val = unserialize($val);
		return $val;
	}

	public static function setVar(string $name, $val)
	{
		self::failNotLogin();
		if (is_object($val))
			$val = serialize($val);
		$_SESSION["data/" . $name] = $val;
	}
}

Session::runSession();
