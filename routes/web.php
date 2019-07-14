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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::post('/images/store', 'ArticleController@store');
Route::post('/article/add', 'ArticleController@store')->name('addarticle');
Route::get('/article/create', 'ArticleController@create')->name('articles.create')->middleware('auth');
Route::get('/article/{id}', 'ArticleController@show')->name('articles.show');