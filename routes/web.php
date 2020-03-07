<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/kamus','KamusController@index');
$router->get('/api/kamus/{kata}','KamusController@detail');
$router->get('/api/kamus/search/{query}','KamusController@search');

$router->get('/api/rima/akhir/{word}','RimaController@getAkhir');
$router->get('/api/rima/awal/{word}','RimaController@getAwal');
$router->get('/api/rima/konsonan/{word}','RimaController@getKonsonan');