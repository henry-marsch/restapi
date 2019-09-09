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
    Route::get('/books', [
        'as' => 'bookshelf.books.indexBooks',
        'uses' => 'BookshelfController@indexBooks'
    ]);

    Route::get('/books/{id}', [
        'as' => 'bookshelf.books.listBooks',
        'uses' => 'BookshelfController@showBook'
    ]);

    Route::get('/books/{id}/authors', [
        'as' => 'bookshelf.books.indexAuthorsByBook',
        'uses' => 'BookshelfController@indexAuthorsByBook'
    ]);

    Route::get('/books/{id}/genres', [
        'as' => 'bookshelf.books.indexGenresByBook',
        'uses' => 'BookshelfController@indexGenresByBook'
    ]);

    Route::get('/authors', [
        'as' => 'bookshelf.authors.indexAuthors',
        'uses' => 'BookshelfController@indexAuthors'
    ]);

    Route::get('/authors/{id}', [
        'as' => 'bookshelf.authors.showAuthor',
        'uses' => 'BookshelfController@showAuthor'
    ]);

    Route::get('/authors/{id}/books', [
        'as' => 'bookshelf.authors.indexBooksByAuthor',
        'uses' => 'BookshelfController@indexBooksByAuthor'
    ]);

    Route::get('/genres', [
        'as' => 'bookshelf.genres.indexGenres',
        'uses' => 'BookshelfController@indexGenres'
    ]);

    Route::get('/genres/{id}', [
        'as' => 'bookshelf.genres.showGenre',
        'uses' => 'BookshelfController@showGenre'
    ]);

});


