
-- Insert some values into a table

-- sqlite3 ./sql/ugarit_database.db < ./sql/insert_values.sql 

/*INSERT INTO PAGES (SLUG, TITLE, HEAD, MAINHTML)
    VALUES ('admin_dictionary', 'Admin::Dictionary', NULL, './components/pages/page_admin_dictionary.php');*/


INSERT INTO SEARCH_WORD
    (WORD, TRANSLATION, CUNEIFORM, INFORMATION)
VALUES
    ('bi-rashu', 'in the beginning', '⁠𐎁𐎗𐎌', '');

