<?php

class Utils
{
	const INDEX = './index.php';
	const LOGIN = './login.php';

	public static function redirect(string $location = self::INDEX)
	{
		header('Location: ' . $location);
		exit();
	}

	# == REDIRECT PARSING ==

	public static function getOrRedirect($map, string $varname, string $location = self::INDEX)
	{
		if (!isset($map[$varname]))
			self::redirect($location);
		return $map[$varname];
	}

	public static function getPostOrRedirect(string $varname, string $location = self::INDEX)
	{
		return self::getOrRedirect($_POST, $varname, $location);
	}
}
