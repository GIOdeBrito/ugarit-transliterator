<?php

require_once './include/ugarit_database.php';

$query_sql =
    "SELECT *
    FROM (
        SELECT *
        FROM SEARCH_WORD
        WHERE WORD LIKE :qparam
        UNION
        SELECT *
        FROM SEARCH_WORD
        WHERE TRANSLATION LIKE :qparam
    )
    AS RESULT
";

$param = $args->param;
$entries = array();

// Executes query only if param is not empty
if(!empty($param))
{
    $db = new UDatabase();

    /* if parameter does not contain the 'percentage' character,
    and the string is equal or greater than two characters, we
    include the 'percentage' for the search query */
    if(!str_contains($param, '%') && strlen($param) >= 2)
    {
        $param = '%'.$param.'%';
    }

    $res = $db->query($query_sql, array(':qparam' => strval($param)));

    foreach($res as $item)
    {
        $keyvalue = array(
            'word' => $item['WORD'],
            'translation' => $item['TRANSLATION'],
            'logograms' => $item['CUNEIFORM'],
            'information' => $item['INFORMATION']
        );
        
        array_push($entries, $keyvalue);
    }
}

echo json_encode(array('result' => $entries));

?>