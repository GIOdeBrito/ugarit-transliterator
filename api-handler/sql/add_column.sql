

-- Add a new column to the the database

ALTER TABLE SEARCH
-- ADD COLUMN COLUMN_NAME TYPE

ADD COLUMN DESCRIPTION TEXT;


-- CHECK ALL TABLES
-- sqlite3 sql/ugarit_words_base.db "PRAGMA table_info(SEARCH);"
