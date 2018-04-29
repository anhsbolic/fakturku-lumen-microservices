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


/*
|--------------------------------------------------------------------------
| Product API Routes
|--------------------------------------------------------------------------
*/

$router->get('api/user/{userId}/product','ProductController@getUserProductList');
$router->get('api/user/{userId}/product/{productId}','ProductController@getUserProduct');
$router->post('api/user/{userId}/product','ProductController@saveUserProduct');
$router->put('api/user/{userId}/product/{productId}','ProductController@updateUserProduct');
$router->delete('api/user/{userId}/product/{productId}','ProductController@deleteUserProduct');
