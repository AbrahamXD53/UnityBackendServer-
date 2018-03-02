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

$router->put('/score/update/{id}', 'ScoreController@update');
$router->put('/user/update/{id}', 'UserController@update');

$router->get('/scores', 'ScoreController@show');
$router->get('/items', 'ItemController@show');
//$router->get('/fill', 'ItemController@fill');
$router->get('/users', 'UserController@show');
$router->get('/users', 'UserController@show');
$router->get('/user/{id}', 'UserController@showUser');


$router->post('/user', 'UserController@store');
$router->post('/score/store', 'ScoreController@store');
$router->post('/user/buy/{id}', 'UserController@buy');
