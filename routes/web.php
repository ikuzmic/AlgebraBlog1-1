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

Route::get('/', 'HomeController@index')->name('home');

/************** POSTS ****************/
Route::get('/posts', 'PostsController@index')->name('posts.index');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::post('/posts', 'PostsController@store')->name('posts.store');

Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');

Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy')->middleware('verified');

Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');

//Roure::resource('posts', 'PostsController');


/************** USERS ****************
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
*/

// zamjena za users rute zakomentirane iznad
Route::resource('users', 'UsersController')->middleware('verified');

/************** COMMENTS ****************/
Route::post('/posts/{post}/comments', 'CommentController@store');

/************** TAGS ****************/
Route::get('/posts/tags/{tag}', 'TagController@index')->name('tags.index');

Route::post('/tags', 'TagController@store')->name('tags.store');

Auth::routes(['verify' => true]);
