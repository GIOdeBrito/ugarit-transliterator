<?php

require 'api/data-access/data_access.php';

$dt = new UDataAccess();

$dt->set_action('testdb');

echo $dt->send();

?>