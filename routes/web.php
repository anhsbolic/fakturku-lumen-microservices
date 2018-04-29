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

/*
|--------------------------------------------------------------------------
| Costumer API Routes
|--------------------------------------------------------------------------
*/

$router->get('api/user/{userId}/costumer','CostumerController@getUserCostumerList');
$router->get('api/user/{userId}/costumer/{costumerId}','CostumerController@getUserCostumer');
$router->post('api/user/{userId}/costumer','CostumerController@saveUserCostumer');
$router->put('api/user/{userId}/costumer/{costumerId}','CostumerController@updateUserCostumer');
$router->delete('api/user/{userId}/costumer/{costumerId}','CostumerController@deleteUserCostumer');

/*
|--------------------------------------------------------------------------
| Supplier API Routes
|--------------------------------------------------------------------------
*/

$router->get('api/user/{userId}/supplier','SupplierController@getUserSupplierList');
$router->get('api/user/{userId}/supplier/{supplierId}','SupplierController@getUserSupplier');
$router->post('api/user/{userId}/supplier','SupplierController@saveUserSupplier');
$router->put('api/user/{userId}/supplier/{supplierId}','SupplierController@updateUserSupplier');
$router->delete('api/user/{userId}/supplier/{supplierId}','SupplierController@deleteUserSupplier');
