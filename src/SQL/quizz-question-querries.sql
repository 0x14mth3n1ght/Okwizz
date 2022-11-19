-- add quizz
INSERT INTO quizz (title, pseudo)
VALUES(:title, :pseudo);
SELECT last_insert_rowid() 'id';
-- add question to quizz
INSERT INTO question (
		question_id,
		quizz_id,
		question,
		c_awnser,
		w_awnser1,
		w_awnser2,
		w_awnser3
	)
VALUES(
		:question_id,
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
FROM quizz q
WHERE q.quizz_id = :quizz_id;
-- get question of quizz
SELECT q.question,
	q.c_awnser,
	q.w_awnser1,
	q.w_awnser2,
	q.w_awnser3
FROM question q
WHERE q.quizz_id = :quizz_id
ORDER BY q.question_id ASC;
-- inc nbparties
UPDATE quizz
SET nbparties = (
		SELECT q.nbparties
		FROM quizz q
		WHERE quizz_id = :quizz_id
	) + 1
WHERE quizz_id = :quizz_id;
-- list quizz
SELECT q.quizz_id,
	q.title,
	q.pseudo,
	q.nbparties
FROM quizz q
ORDER BY q.nbparties DESC;