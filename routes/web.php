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

// Web Routes
$router->get('/', 'WebControllers\WebController@index');
$router->post('/', 'WebControllers\WebController@search');
$router->get('rima/{word}', 'WebControllers\WebController@rima');
$router->get('rima/{word}/{type}', 'WebControllers\WebController@more');

// prefix API v1
// /api/v1
$router->group(['prefix' => 'api/v1'], function () use ($router) {

    // Kamus Controller
    // /api/v1/kamus
    $router->group(['prefix' => 'kamus'], function() use ($router) {
        $router->get('','ApiControllers\V1Controllers\KamusController@index');
        $router->get('{kata}','ApiControllers\V1Controllers\KamusController@detail');
        $router->get('search/{query}','ApiControllers\V1Controllers\KamusController@search');
    });

    // Rima Controller
    // /api/v1/rima
    $router->group(['prefix' => 'rima'], function() use ($router) {
        //akhir
        $router->get('akhir/{word}','ApiControllers\V1Controllers\RimaController@getAkhir');
        $router->get('akhir-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAkhir');
        $router->get('ganda/{word}','ApiControllers\V1Controllers\RimaController@getAkhirGanda');
        $router->get('ganda-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAkhirGandaParsial');

        // awal
        $router->get('awal/{word}','ApiControllers\V1Controllers\RimaController@getAwal');
        $router->get('awal-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAwalParsial');

        // lainnya
        $router->get('konsonan/{word}','ApiControllers\V1Controllers\RimaController@getKonsonan');
    });
});

