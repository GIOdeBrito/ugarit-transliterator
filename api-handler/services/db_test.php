<?php

require_once './include/ugarit_database.php';

$db = new UDatabase();
$res = $db->query('SELECT * FROM SEARCH');

echo "Itens: ";

foreach($res as $item)
{
    echo "WORD: ".$item['WORD'];
    echo "DESC: ".$item['DESCRIPTION'];
}

?>