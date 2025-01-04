<?php

$router->add_route('GET', '/', function ()
{
	HomeController::index();
});

$router->add_route('GET', '/transliterate/', function ()
{
	TransliterateController::index();
});

$router->add_route('GET', '/dictionary/', function ()
{
	DictionaryController::index();
});

$router->add_route('GET', '/onomastics/', function ()
{
	OnomasticsController::index();
});

$router->add_route('GET', '/404/', function ()
{
	NotfoundController::index();
});

?>