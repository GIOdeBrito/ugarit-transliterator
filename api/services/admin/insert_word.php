<?php

require_once './include/ugarit_database.php';

$db = new UDatabase();

$sql_args = array(
    ':word' => $args->word,
    ':cuneo' => $args->cuneiform,
    ':translation' => $args->translation,
    ':descript' => $args->desc
);

$word_sql = "INSERT
    INTO SEARCH_WORD
        (WORD, TRANSLATION, CUNEIFORM, INFORMATION)
    VALUES
        (:word, :translation, :cuneo, :descript)
";

$res = $db->exec($word_sql, $sql_args);

echo json_encode(array('res' => $res));

?>