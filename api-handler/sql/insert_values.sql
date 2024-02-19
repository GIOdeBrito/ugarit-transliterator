
-- Insert some values into a table

-- INSERT INTO SEARCH (WORD, ACCUSATIVE, DATIVE, GENITIVE, DESCRIPTION) VALUES ('bitum', 'Ugaritic word for house.');
-- INSERT INTO SEARCH (WORD, DESCRIPTION) VALUES ('bitum', 'Ugaritic word for house.');


-- sqlite3 ./sql/ugarit_pages.db < ./sql/insert_values.sql 

/*INSERT INTO PAGES (SLUG, TITLE, HEAD, MAINHTML)
    VALUES ('dictionary', 'Dictionary', NULL, './components/page_dictionary.php');*/


INSERT INTO SEARCH_WORD
    (WORD, TRANSLATION, CUNEIFORM, INFORMATION)
VALUES
    ('bitu', 'house', '𐎁𐎚', '');

