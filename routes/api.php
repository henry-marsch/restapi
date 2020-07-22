<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(array('prefix' => 'books'), function()
{
    Route::post('/', [
        'as' => 'books.create',
        'uses' => 'BookController@create'
    ]);

    Route::get('/', [
        'as' => 'books.list',
        'uses' => 'BookController@list'
    ]);

    Route::get('/{id}', [
        'as' => 'books.show',
        'uses' => 'BookController@show'
    ]);
});

Route::group(array('prefix' => 'googlebooks'), function()
{
    Route::get('/test', [
        'as' => 'googlebooks.test',
        'uses' => 'GooglebooksController@test'
    ]);
});

Route::group(array('prefix' => 'products'), function()
{
    Route::post('/', [
        'as' => 'products.create',
        'uses' => 'ProductController@create'
    ]);

    Route::get('/', [
        'as' => 'products.list',
        'uses' => 'ProductController@list'
    ]);

});


