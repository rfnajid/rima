<?php

// prefix API v1
// /api/v1
$router->group(['prefix' => 'api/v1'], function () use ($router) {

    // Kamus Controller
    // /api/v1/kamus
    $router->group(['prefix' => 'kamus'], function() use ($router) {
        $router->get('','ApiControllers\V1Controllers\KamusController@index');
        $router->get('{word}','ApiControllers\V1Controllers\KamusController@detail');
        $router->get('search/{query}','ApiControllers\V1Controllers\KamusController@search');
    });

    // Rima Controller
    // /api/v1/rima
    $router->group(['prefix' => 'rima'], function() use ($router) {
        //akhir
        $router->get('akhir/{word}','ApiControllers\V1Controllers\RimaController@getAkhir');
        // $router->get('akhir-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAkhir');
        $router->get('akhir-ganda/{word}','ApiControllers\V1Controllers\RimaController@getAkhirGanda');
        // $router->get('ganda-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAkhirGandaParsial');

        // awal
        $router->get('awal/{word}','ApiControllers\V1Controllers\RimaController@getAwal');
        $router->get('awal-ganda/{word}','ApiControllers\V1Controllers\RimaController@getAwalGanda');
        // $router->get('awal-parsial/{word}','ApiControllers\V1Controllers\RimaController@getAwalParsial');

        // lainnya
        $router->get('konsonan/{word}','ApiControllers\V1Controllers\RimaController@getKonsonan');
        $router->get('vokal/{word}','ApiControllers\V1Controllers\RimaController@getVokal');

    });

    // Kamus Controller
    // /api/v1/pantun
    $router->group(['prefix' => 'pantun'], function() use ($router) {
        $router->get('','ApiControllers\V1Controllers\PantunController@index');
        $router->post('karmina','ApiControllers\V1Controllers\PantunController@karmina');
    });
});

