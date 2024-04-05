<?php

$delete_sql = "DELETE FROM SEARCH_WORD WHERE ID = :index";
$sql_args = array(':index' => $args->indexval);

$db = new UDatabase();
$res = $db->exec($sql_args);

echo json_encode(array('res' => $res));

?>