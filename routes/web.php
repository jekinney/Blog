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

Route::get('/', ['as' => 'home', 'uses' => 'Web\Front\Site\HomeController@show']);

Route::group(['prefix' => 'blog', 'as' => 'blogs.', 'namespace' => 'Web\Front\Blogs'], function() {
	Route::get('categories', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
	Route::get('category/{slug}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);

	Route::get('articles', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
	Route::get('article/{slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
});

Route::group(['prefix' => 'admin/blog', 'as' => 'admin.blogs.', 'namespace' => 'Web\Back\Blogs'], function() {
	Route::get('categories', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
	Route::get('category/{slug}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
	Route::post('category', ['as' => 'category.store', 'uses' => 'CategoryController@store']);

	Route::get('articles', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
	Route::get('article/{slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
});

Route::group(['prefix' => 'dashboard', 'as' => 'dash.', 'namespace' => 'Web\Back'], function() {
	Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);

	Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blogs'], function() {
		Route::resource('category', 'CategoryController');
	});
});

Auth::routes();
