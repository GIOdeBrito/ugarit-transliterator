<?php

date_default_timezone_set('America/Fortaleza');

function get_time ()
{
    http_response_code(200);
    echo date('d/m/Y H:i:s', time());
    die();
}

?>