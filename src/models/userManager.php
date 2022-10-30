<?php
require_once 'db.php';

class UserManager {

	# =========
	# == API ==
	# =========
	/**
	 * TODO: add nb party played
	 */

	/**
	 * Register a player in the database.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return boolean true if the operation is sucessfull
	 *         false if the player already exist
	 */
	public static function registerPlayer(string $pseudo, string $passwd): bool{
		$passwdhash = password_hash($passwd, PASSWORD_ARGON2ID);
		return UserManager::registerPlayerDB($pseudo, $passwdhash);
	}

	/**
	 * Verify the the password provided by the player is correct.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return boolean true if the password is verified
	 *         false if the password does not match or the player does not exist.
	 */
	public static function verifyPassword(string $pseudo, string $passwd): bool{
		$info = UserManager::getInfosDB($pseudo);
		if(!$info || empty($info))
			return false;
		return password_verify($passwd, $info[0]["passwdhash"]);
	}

	/**
	 * Get the hightscore of the player.
	 *
	 * @param string $pseudo
	 * @return boolean|int false if the player does not exist,
	 *         the highscore otherwith.
	 */
	public static function getHighscore(string $pseudo){
		$info = UserManager::getInfosDB($pseudo);
		if(!$info || empty($info))
			return false;
		return $info[0]["highscore"];
	}

	/**
	 * Set the password of the player.
	 *
	 * @param string $pseudo
	 * @param string $passwd
	 * @return bool true if sucessfull,
	 *         false if the player does not exist.
	 */
	public static function setPassword(string $pseudo, string $passwd): bool{
		$passwdhash = password_hash($passwd, PASSWORD_ARGON2ID);
		return UserManager::setPasswordDB($pseudo, $passwdhash);
	}

	/**
	 * Set the hightscore of the player.
	 *
	 * @param string $pseudo
	 * @param string $highscore
	 * @return bool true if sucessfull,
	 *         false if the player does not exist.
	 */
	public static function setHighscore(string $pseudo, string $highscore): bool{
		if($highscore < 0)
			return false;
		return UserManager::setHighscoreDB($pseudo, $highscore);
	}

	/**
	 * Delete a player from the database.
	 *
	 * @param string $pseudo
	 * @return bool true is the player have been sucessfully deleted,
	 *         false if it already does not exist.
	 */
	public static function deletePlayer(string $pseudo): bool{
		return UserManager::deletePlayerDB($pseudo);
	}

	/**
	 * Get the list of players and hight score sort by hight score.
	 *
	 * @return unknown
	 */
	public static function getAllUserHightscore(){
		return UserManager::getAllUserHightscoreDB();
	}

	# ================
	# == DB QUERRY ==
	# ===============

	/**
	 * Register a player in the database.
	 *
	 * @param string $pseudo
	 * @param string $passwdhash
	 * @return bool
	 */
	private static function registerPlayerDB(string $pseudo, string $passwdhash): bool{
		$stmt = DB::getDB()->prepare("INSERT INTO 'User' (pseudo, passwdhash)
		VALUES (:pseudo, :passwdhash);");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':passwdhash', $passwdhash, PDO::PARAM_STR);
		try{
			return $stmt->execute();
		}catch(PDOException $e){
			return false;
		}
	}

	/**
	 * Get Information about a player.
	 *
	 * @param string $pseudo
	 * @return unknown|boolean (psswdhash, hightscore)
	 */
	private static function getInfosDB(string $pseudo){
		$stmt = DB::getDB()->prepare("SELECT u.passwdhash, u.highscore
		FROM 'User' u
		WHERE u.pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		try{
			$stmt->execute();
			return DB::fetchToMap($stmt);
		}catch(PDOException $e){
			return false;
		}
	}

	/**
	 * Set the password hash of the player with the pseudo passed in argument.
	 *
	 * @param string $pseudo
	 * @param string $passwdhash
	 * @return bool
	 */
	private static function setPasswordDB(string $pseudo, string $passwdhash): bool{
		$stmt = DB::getDB()->prepare("UPDATE 'User'
		SET passwdhash = :passwdhash
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':passwdhash', $passwdhash, PDO::PARAM_STR);
		try{
			$stmt->execute();
			return $stmt->rowCount() == 1;
		}catch(PDOException $e){
			return false;
		}
	}

	/**
	 * Set the highscore of player with the pseudo passed in argument.
	 *
	 * @param string $pseudo
	 * @param int $highscore
	 * @return bool
	 */
	private static function setHighscoreDB(string $pseudo, int $highscore): bool{
		$stmt = DB::getDB()->prepare("UPDATE 'User'
		SET highscore = :highscore
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindValue(':highscore', $highscore, PDO::PARAM_INT);
		try{
			$stmt->execute();
			return $stmt->rowCount() == 1;
		}catch(PDOException $e){
			return false;
		}
	}

	/**
	 * Delete a player from the database.
	 *
	 * @param string $pseudo
	 * @return bool
	 */
	private static function deletePlayerDB(string $pseudo): bool{
		$stmt = DB::getDB()->prepare("DELETE FROM 'User'
		WHERE pseudo = :pseudo;");
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		try{
			$stmt->execute();
			return $stmt->rowCount() == 1;
		}catch(PDOException $e){
			return false;
		}
	}

	/**
	 * Get the list of players and hight score sort by hight score.
	 *
	 * @return unknown[]|boolean
	 */
	private static function getAllUserHightscoreDB(){
		$stmt = DB::getDB()->prepare("SELECT u.pseudo, u.highscore
		FROM 'User' u
		ORDER BY u.highscore DESC;");
		try{
			$stmt->execute();
			return DB::fetchToMap($stmt);
		}catch(PDOException $e){
			return false;
		}
	}
}
?>
