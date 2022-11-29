<?php
include_once 'error.php';
require_once 'db.php';

class UserManager
{

	# =========
	# == API ==
	# =========

	# == Constructeur & Destructeur ==

	/**
	 * Register a player in the database.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return boolean true if the operation is sucessfull
	 * false if the player already exist
	 */
	public static function registerPlayer(string $pseudo, string $passwd): bool
	{
		$passwdhash = password_hash($passwd, PASSWORD_ARGON2ID);
		return self::registerPlayerDB($pseudo, $passwdhash);
	}

	/**
	 * Delete a player from the database.
	 *
	 * @param string $pseudo
	 * @return bool true is the player have been sucessfully deleted,
	 * false if it already does not exist.
	 */
	public static function deletePlayer(string $pseudo): bool
	{
		return self::deletePlayerDB($pseudo);
	}

	# == Getter ==

	/**
	 * Verify the the password provided by the player is correct.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return boolean true if the password is verified
	 * false if the password does not match or the player does not exist.
	 */
	public static function verifyPassword(string $pseudo, string $passwd): bool
	{
		$infos = self::getPasswdhashDB($pseudo);
		if (!$infos || empty($infos))
			return false;
		$passwdhash = $infos[0]["passwdhash"];
		return password_verify($passwd, $passwdhash);
	}

	/**
	 * Get the highscore of the player.
	 *
	 * @param string $pseudo
	 * @return int|boolean the highscore or false if the player does not exist.
	 */
	public static function getHighscore(string $pseudo)
	{
		$infos = self::getHighscoreDB($pseudo);
		if (!$infos || empty($infos))
			return false;
		$highscore = $infos[0]["highscore"];
		return $highscore;
	}

	/**
	 * Get the number of parties played.
	 *
	 * @param string $pseudo
	 * @return int|boolean the number of parties or false if the player does not exist.
	 */
	public static function getNbparties(string $pseudo)
	{
		$infos = self::getNbpartiesDB($pseudo);
		if (!$infos || empty($infos))
			return false;
		$nbparties = $infos[0]["nbparties"];
		return $nbparties;
	}

	/**
	 * Get appscore & review of the player.
	 * 
	 * @param string $pseudo
	 * @return unknow[]|boolean 
	 * $info["appscore"] score of the user
	 * $info["review"] review of the user
	 * false if the user does not exist or have not set a review.
	 */
	public static function getReview(string $pseudo)
	{
		$infos = self::getReviewDB($pseudo);
		if (!$infos || empty($infos))
			return false;
		$info = $infos[0];
		if (is_null($info["appscore"]) || is_null($info["review"]))
			return false;
		return $info;
	}

	# == Setter ==

	/**
	 * Set the password of the player.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return bool true if sucessfull,
	 * false if the player does not exist.
	 */
	public static function setPassword(string $pseudo, string $passwd): bool
	{
		$passwdhash = password_hash($passwd, PASSWORD_ARGON2ID);
		return self::setPasswdhashDB($pseudo, $passwdhash);
	}

	/**
	 * Set the highscore of the player.
	 *
	 * @param string $pseudo
	 * @param int $highscore
	 * @return bool true if sucessfull,
	 * false if the player does not exist or an invalide score was given.
	 */
	public static function setHighscore(string $pseudo, int $highscore): bool
	{
		if ($highscore < 0)
			return false;
		return self::setHighscoreDB($pseudo, $highscore);
	}

	/**
	 * Increment by 1 the number of parties played by $pseudo.
	 *
	 * @param string $pseudo
	 * @return bool return true if sucessfull
	 * false if the player does not exist.
	 */
	public static function incNbparties(string $pseudo): bool
	{
		return self::incNbpartiesDB($pseudo);
	}

	/**
	 * Set the review of the player.
	 *
	 * @param string $pseudo
	 * @param int $appscore
	 * @param string $review
	 * @return bool true if sucessfull,
	 * false if the player does not exist or an invalide appscore was given.
	 */
	public static function setReview(string $pseudo, int $appscore, string $review): bool
	{
		if ($appscore < 0 || $appscore > 5)
			return false;
		return self::setReviewDB($pseudo, $appscore, $review);
	}

	# == Other fontions ==

	/**
	 * Get the list of players, highscore & nbparties sort by highscore.
	 *
	 * @return unknown[] (pseudo, highscore, nbparties)
	 */
	public static function getAllUserHighscore()
	{
		return self::getAllUserScoreDB();
	}

	/**
	 * Get the list of players, appscores & reviews sort by appscores.
	 *
	 * @return unknown[] (pseudo, appscore, review)
	 */
	public static function getAllUserReview()
	{
		return self::getAllUserReviewDB();
	}

	# ================
	# == DB QUERRY ==
	# ===============

	# == Constructeur & Destructeur ==

	/**
	 * Register a player in the database.
	 *
	 * @param string $pseudo
	 * @param string $passwdhash
	 * @return bool
	 */
	private static function registerPlayerDB(string $pseudo, string $passwdhash): bool
	{
		$stmt = DB::getDB()->prepare("INSERT INTO player (pseudo, passwdhash)
		VALUES (:pseudo, :passwdhash);");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':passwdhash', $passwdhash, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	/**
	 * Delete a player from the database.
	 *
	 * @param string $pseudo
	 * @return bool
	 */
	private static function deletePlayerDB(string $pseudo): bool
	{
		$stmt = DB::getDB()->prepare("DELETE FROM player
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Getter ==

	/**
	 * Get Passwdhash.
	 *
	 * @param string $pseudo
	 * @return unknow[]|boolean psswdhash
	 */
	private static function getPasswdhashDB(string $pseudo)
	{
		$stmt = DB::getDB()->prepare("SELECT p.passwdhash
		FROM player p
		WHERE p.pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmtR($stmt);
	}

	/**
	 * Get highscore.
	 *
	 * @param string $pseudo
	 * @return int|boolean highscore
	 */
	private static function getHighscoreDB(string $pseudo)
	{
		$stmt = DB::getDB()->prepare("SELECT p.highscore
		FROM player p
		WHERE p.pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmtR($stmt);
	}

	/**
	 * Get nbparties.
	 *
	 * @param string $pseudo
	 * @return int|boolean nbparties
	 */
	private static function getNbpartiesDB(string $pseudo)
	{
		$stmt = DB::getDB()->prepare("SELECT p.nbparties
		FROM player p
		WHERE p.pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmtR($stmt);
	}

	/**
	 * Get appscore & review.
	 *
	 * @param string $pseudo
	 * @return unknow[]|boolean appscore & review
	 */
	private static function getReviewDB(string $pseudo)
	{
		$stmt = DB::getDB()->prepare("SELECT p.appscore,
			p.review
		FROM player p
		WHERE p.pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmtR($stmt);
	}

	# == Setter ==

	/**
	 * Set passwdhash.
	 *
	 * @param string $pseudo
	 * @param string $passwdhash
	 * @return bool
	 */
	private static function setPasswdhashDB(string $pseudo, string $passwdhash): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE player
		SET passwdhash = :passwdhash
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':passwdhash', $passwdhash, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	/**
	 * Set highscore.
	 *
	 * @param string $pseudo
	 * @param int $highscore
	 * @return bool
	 */
	private static function setHighscoreDB(string $pseudo, int $highscore): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE player
		SET highscore = :highscore
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':highscore', $highscore, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	/**
	 * Increment nbparties by 1
	 *
	 * @param string $pseudo
	 * @return bool
	 */
	private static function incNbpartiesDB(string $pseudo): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE player
		SET nbparties = (
				SELECT p.nbparties
				FROM player p
				WHERE pseudo = :pseudo
			) + 1
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	/**
	 * Set appscore & review.
	 *
	 * @param string $pseudo
	 * @param int $appscore
	 * @param string $review
	 * @return bool
	 */
	private static function setReviewDB(string $pseudo, int $appscore, string $review): bool
	{
		$stmt = DB::getDB()->prepare("UPDATE player
		SET appscore = :appscore,
			review = :review
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':appscore', $appscore, PDO::PARAM_INT);
		$stmt->bindValue(':review', $review, PDO::PARAM_STR);
		return DB::tryRunStmt($stmt, 1);
	}

	# == Other fontions ==

	/**
	 * Get all user pseudo, highscore & nbparties
	 *
	 * @return unknown[]|boolean (pseudo, highscore, nbparties)
	 */
	private static function getAllUserScoreDB()
	{
		$stmt = DB::getDB()->prepare("SELECT p.pseudo,
			p.highscore,
			p.nbparties
		FROM player p
		ORDER BY p.highscore DESC;");
		return DB::tryRunStmtR($stmt);
	}

	/**
	 * Get all user pseudo, appscores & reviews
	 *
	 * @return unknown[]|boolean (pseudo, appscore, review)
	 */
	private static function getAllUserReviewDB()
	{
		$stmt = DB::getDB()->prepare("SELECT p.pseudo,
			p.appscore,
			p.review
		FROM player p
		WHERE p.review <> ''
		ORDER BY p.appscore DESC;");
		return DB::tryRunStmtR($stmt);
	}
}
