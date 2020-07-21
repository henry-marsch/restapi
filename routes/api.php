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

Route::group(array('prefix' => 'bookshelf'), function()
{
    Route::post('/books', [
        'as' => 'bookshelf.books.create',
        'uses' => 'BookshelfController@createBook'
    ]);

    Route::get('/books', [
        'as' => 'bookshelf.books.listBooks',
        'uses' => 'BookshelfController@listBooks'
    ]);

    Route::get('/books/search', [
        'as' => 'bookshelf.books.search',
        'uses' => 'BookshelfController@searchBooks'
    ]);

    Route::get('/books/{id}', [
        'as' => 'bookshelf.books.listBooks',
        'uses' => 'BookshelfController@showBook'
    ]);

    Route::get('/books/{id}/authors', [
        'as' => 'bookshelf.books.listAuthorsByBook',
        'uses' => 'BookshelfController@listAuthorsByBook'
    ]);

    Route::get('/books/{id}/genres', [
        'as' => 'bookshelf.books.listGenresByBook',
        'uses' => 'BookshelfController@listGenresByBook'
    ]);

    Route::get('/authors', [
        'as' => 'bookshelf.authors.listAuthors',
        'uses' => 'BookshelfController@listAuthors'
    ]);

    Route::get('/authors/search', [
        'as' => 'bookshelf.authors.search',
        'uses' => 'BookshelfController@searchAuthors'
    ]);

    Route::get('/authors/{id}', [
        'as' => 'bookshelf.authors.showAuthor',
        'uses' => 'BookshelfController@showAuthor'
    ]);

    Route::get('/authors/{id}/books', [
        'as' => 'bookshelf.authors.listBooksByAuthor',
        'uses' => 'BookshelfController@listBooksByAuthor'
    ]);

    Route::get('/genres', [
        'as' => 'bookshelf.genres.listGenres',
        'uses' => 'BookshelfController@listGenres'
    ]);

    Route::get('/genres/search', [
        'as' => 'bookshelf.genres.search',
        'uses' => 'BookshelfController@searchGenres'
    ]);

    Route::get('/genres/{id}', [
        'as' => 'bookshelf.genres.showGenre',
        'uses' => 'BookshelfController@showGenre'
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
});


