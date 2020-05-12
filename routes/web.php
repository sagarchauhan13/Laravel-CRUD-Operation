<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/articles','ArticleController@show')->name('articles');
Route::get('/articles/add','ArticleController@addArticle')->name('articles.add');
Route::post('/articles/add','ArticleController@saveArticle')->name('articles.save');
Route::get('/articles/edit/{id}','ArticleController@editArticle')->name('articles.edit');
Route::post('/articles/edit/{id}','ArticleController@updateArticle')->name('articles.update');
Route::get('/articles/delete/{id}','ArticleController@deleteArticle')->name('articles.delete');
Route::get('/home/photography','ArticleController@photography')->name('articles.photography');
Route::get('/home/fashion','ArticleController@fashion')->name('articles.fashion');
Route::get('/home/scientific','ArticleController@scientific')->name('articles.scientific');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
