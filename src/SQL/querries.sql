-- register player
INSERT INTO 'User' (pseudo, passwdhash)
VALUES (:pseudo, :passwdhash);

-- get infos
SELECT u.passwdhash, u.highscore
FROM 'User' u
WHERE u.pseudo = :pseudo;

-- set infos
UPDATE 'User'
SET passwdhash = :passwdhash, highscore = :highscore
WHERE pseudo = :pseudo;

-- get all user highscore
SELECT u.pseudo, u.highscore
FROM 'User' u
ORDER BY u.highscore DESC;

-- delete player
DELETE FROM 'User'
WHERE pseudo = :pseudo;