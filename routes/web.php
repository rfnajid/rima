<?php


// Web Routes
$router->get('/', 'WebControllers\WebController@index');
$router->post('/', 'WebControllers\WebController@search');
$router->get('rima/{word}', 'WebControllers\WebController@rima');
$router->get('rima/{word}/{type}', 'WebControllers\WebController@more');