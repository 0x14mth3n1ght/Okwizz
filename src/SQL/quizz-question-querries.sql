-- add quizz
INSERT INTO quizz (title, pseudo)
VALUES(:title, :pseudo);
-- add question to quizz
INSERT INTO question (
		quizz_id,
		question,
		c_awnser,
		w_awnser1,
		w_awnser2,
		w_awnser3
	)
VALUES(
		:quizz_id,
		:question,
		:c_awnser,
		:w_awnser1,
		:w_awnser2,
		:w_awnser3
	);
-- get quizz
SELECT q.title,
	q.pseudo,
	q.nbparties
FROM q.quizzs
WHERE q.id = :id;
-- get question of quizz
SELECT q.question,
	q.c_awnser,
	q.w_awnser1,
	q.w_awnser2,
	q.w_awnser3
FROM question q
WHERE q.quizz_id = :quizz_id;
-- list quizz
SELECT q.id,
	q.title,
	q.pseudo,
	q.nbparties
FROM quizzs q;
-- inc nbparties
UPDATE quizz
SET nbparties = (
		SELECT q.nbparties
		FROM quizz q
		WHERE id = :id
	) + 1
WHERE id = :id;