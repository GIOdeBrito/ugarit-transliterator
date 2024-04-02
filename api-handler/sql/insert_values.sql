
-- Insert some values into a table

-- sqlite3 ./sql/ugarit_database.db < ./sql/insert_values.sql 

INSERT INTO PAGES (SLUG, TITLE, HEAD, MAINHTML)
    VALUES ('transliterate', 'Transliterate', NULL, './components/pages/page_transliterator.php');

/*
INSERT INTO SEARCH_WORD
    (WORD, TRANSLATION, CUNEIFORM, INFORMATION)
VALUES
    ('bitu', 'house', '𐎁𐎚', '');*/

