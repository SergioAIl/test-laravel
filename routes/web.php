<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $authors = App\Author::getAuthorsBooks();
    return view('welcome', compact('authors'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
});

Route::resource('authors','AuthorController');
Route::resource('books','BookController');