<?php

require_once '../../helpers/ugarit_database.php';

$db = new Database();
$res = $db->query('SELECT * FROM SEARCH_WORD');

http_response_code(200);
echo json_encode($res);

?>