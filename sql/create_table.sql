
-- run sqlite3 ugarit_words_base.db < [command_file].sql
-- Creates a new table on the file

/*
CREATE TABLE ***TABLE_NAME*** (
	ID INTEGER PRIMARY KEY,
	NAME TEXT NOT NULL,
	DESCRIPTION TEXT NOT NULL
);
*/

CREATE TABLE PAGES (
	ID INTEGER PRIMARY KEY,
	SLUG TEXT NOT NULL,
	TITLE TEXT NOT NULL,
	HEAD TEXT,
	MAINHTML TEXT
);
