<?php

require 'api/data_access.php';

$dt = new UDataAccess();

$dt->set_action('testdb');

echo $dt->send();

?>