-- register player
INSERT INTO player (pseudo, passwdhash)
VALUES (:pseudo, :passwdhash);
-- delete player
DELETE FROM player
WHERE pseudo = :pseudo;
-- get passwdhash
SELECT p.passwdhash
FROM player p
WHERE p.pseudo = :pseudo;
-- set passwdhash
UPDATE player
SET passwdhash = :passwdhash
WHERE pseudo = :pseudo;
-- get highscore
SELECT p.highscore
FROM player p
WHERE p.pseudo = :pseudo;
-- set highscore
UPDATE player
SET highscore = :highscore
WHERE pseudo = :pseudo;
-- get nbparties
SELECT p.nbparties
FROM player p
WHERE p.pseudo = :pseudo;
-- inc nbparties
UPDATE player
SET nbparties = (
		SELECT p.nbparties
		FROM player p
		WHERE pseudo = :pseudo
	) + 1
WHERE pseudo = :pseudo;
-- get appscore & review
SELECT p.appscore,
	p.review
FROM player p
WHERE p.pseudo = :pseudo;
-- set appscore & review
UPDATE player
SET appscore = :appscore,
	review = :review
WHERE pseudo = :pseudo;
-- get all user pseudo, highscore & nbparties
SELECT p.pseudo,
	p.highscore,
	p.nbparties
FROM player p
ORDER BY p.highscore DESC;
-- get all user pseudo, appscores & reviews
SELECT p.pseudo,
	p.appscore,
	p.review
FROM player p
WHERE p.review <> ''
ORDER BY p.appscore DESC;