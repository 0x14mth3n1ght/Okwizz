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

