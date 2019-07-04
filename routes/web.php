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

    $posts = [
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim magna massa, eget tristique augue suscipit a. Aenean consectetur dictum nulla quis efficitur. Donec dui erat, imperdiet sit amet laoreet condimentum, sagittis eget neque. Vivamus aliquam ut nibh eu bibendum. Fusce dignissim, quam non pellentesque elementum, orci ligula vehicula elit, sed maximus nibh nisi non augue. Duis facilisis, urna nec elementum pharetra, dui nisl rhoncus augue, at hendrerit sem mauris et nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'Quisque blandit elementum sagittis. Donec vel molestie arcu. Vestibulum scelerisque leo quis tortor congue, interdum aliquam purus vulputate. Vivamus vehicula in libero eu ornare. Cras posuere ultrices augue ut dictum. Ut at lobortis ex, sit amet semper orci. Integer cursus tincidunt pulvinar. Suspendisse potenti. Nullam eleifend quam scelerisque elit luctus bibendum. Vivamus ut viverra nunc.',
        'Nam tellus elit, condimentum nec odio sit amet, dignissim feugiat felis. Nunc non interdum justo. Donec suscipit luctus euismod. Duis nec tristique ligula. Nunc tempor suscipit consectetur. Maecenas ultricies volutpat mattis. Nam eros ante, molestie et vulputate vel, rhoncus dapibus dolor. In metus sem, ultricies ac ante ac, pharetra convallis augue.'
    ];

    return view('welcome', compact('posts'));
});

Route::get('/posts', 'PostsController@index');

Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//https://v4-alpha.getbootstrap.com/examples/blog/