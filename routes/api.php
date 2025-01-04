<?php

$router->add_route('GET', '/api/v1/time/', function ()
{
	ApiTestController::time_now();
});

$router->add_route('GET', '/api/v1/dbtest/', function ()
{
	ApiTestController::database_test();
});

$router->add_route('POST', '/api/v1/wordsearch/', function ()
{
	ApiDatabase::word_search();
});

$router->add_route('POST', '/api/v1/transliterate/', function ()
{
	ApiDatabase::transliterate();
});

?>