

--SELECT * FROM PAGES;

--SELECT * FROM SEARCH_WORD;

/*
SELECT *
FROM (
    SELECT *
    FROM SEARCH_WORD
    WHERE WORD = 'abu'
    UNION ALL
    SELECT *
    FROM SEARCH_WORD
    WHERE TRANSLATION = 'abu'
) AS RESULT;
*/

SELECT * FROM SEARCH_WORD ORDER BY ID ASC;

