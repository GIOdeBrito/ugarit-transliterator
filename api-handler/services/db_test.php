<?php

require_once './include/ugarit_database.php';

$db = new UDatabase();
$res = $db->query('SELECT * FROM SEARCH_WORD');

echo var_dump($res);

echo "Itens: ";

foreach($res as $item)
{
    echo "WORD: ".$item['WORD'];
    echo "DESC: ".$item['INFORMATION'];
}

?>