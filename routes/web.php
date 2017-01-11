<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['namespace' => 'Article'], function()
{
	/* Блог (Вывод всех новостей) */
	Route::get('/', 'ArticleController@allArticle');


	/* Просмотр одной новости */
	Route::get('/{id}', 'ArticleController@oneArticle')
	->where('id', '[0-9]+');

	/* Добавление новости */
	Route::get('/add', 'ArticleController@addArticle');
    Route::post('/add', 'ArticleController@addArticlePost');

	/* Редактирование новости */
	Route::get('/edit/{id}', 'ArticleController@editArticle')
	->where('id', '[0-9]+');
    Route::post('/edit/{id}', 'ArticleController@editArticlePost');

	/* Удаление новости */
	Route::get('/delete/{id}', 'ArticleController@deleteArticle')
	->where('id', '[0-9]+');
});