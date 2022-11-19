-- player drop
DROP TABLE IF EXISTS player;
-- player create
CREATE TABLE player (
	pseudo TEXT(32) NOT NULL,
	passwdhash TEXT NOT NULL,
	highscore INTEGER DEFAULT 0 NOT NULL,
	nbparties INTEGER DEFAULT 0 NOT NULL,
	appscore INTEGER,
	review TEXT(512),
	CONSTRAINT Player_PK PRIMARY KEY (pseudo)
);
-- quizzs drop
DROP TABLE IF EXISTS quizzs;
-- quizzs create
CREATE TABLE quizzs (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title TEXT(32) NOT NULL,
	pseudo TEXT(32) NOT NULL,
	nbparties INTEGER DEFAULT 0,
	CONSTRAINT quizzs_FK FOREIGN KEY (pseudo) REFERENCES player(pseudo) ON DELETE CASCADE
);
-- questions drop
DROP TABLE IF EXISTS question;
-- questions create
CREATE TABLE question (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	quizz_id INTEGER,
	question TEXT(80) NOT NULL,
	c_awnser TEXT(20) NOT NULL,
	w_awnser1 TEXT(20) NOT NULL,
	w_awnser2 TEXT(20) NOT NULL,
	w_awnser3 TEXT(20) NOT NULL,
	CONSTRAINT question_FK FOREIGN KEY (quizz_id) REFERENCES quizzs(id) ON DELETE CASCADE
);