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
Route::get('/posts', 'PostsController@index')->name('posts.index');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::post('/posts','PostsController@store')->name('posts.store');





/************** USERS ****************/
// prikaži sve usere
Route::get('/users', 'UsersController@index')->name('users.index');

// prikaži formu za kreiranje usera
Route::get('/users/create', 'UsersController@create')->name('users.create');

// spremi usera u bazu
Route::post('/users', 'UsersController@store')->name('users.store');

// prikaži formu za uređivanje usera
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

// spremi uređenog usera u bazu
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');

// obriši usera
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

// prikaži jednog usera
Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
