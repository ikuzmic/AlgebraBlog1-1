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

/************** POSTS ****************/
Route::get('/', 'PostsController@index')->name('posts');

Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');


/************** USERS ****************/
Route::get('/users', 'UsersController@index')->name('users');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
