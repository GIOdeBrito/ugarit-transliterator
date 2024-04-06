<?php

require_once './include/ugarit_database.php';

$query_sql = "SELECT *
FROM (
    SELECT *
    FROM SEARCH_WORD
    WHERE WORD LIKE :qparam
    UNION ALL
    SELECT *
    FROM SEARCH_WORD
    WHERE TRANSLATION LIKE :qparam
) AS RESULT
";

$param = $args->param;
$entries = array();

// Executes query only if param is not empty
if(!empty($param))
{
    $db = new UDatabase();
    $res = $db->query($query_sql, array(':qparam' => strval('%'.$param.'%')));

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