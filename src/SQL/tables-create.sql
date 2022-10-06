-- "User" definition

DROP TABLE IF EXISTS "User";

CREATE TABLE "User" (
	pseudo TEXT NOT NULL,
	passwdhash TEXT NOT NULL,
	highscore INTEGER DEFAULT 0 NOT NULL,
	CONSTRAINT User_PK PRIMARY KEY (pseudo)
);

