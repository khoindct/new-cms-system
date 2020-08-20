<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function() {
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::get('admin/post', 'PostController@index')->name('post.index');
    Route::get('admin/post/create', 'PostController@create')->name('post.create');
    Route::post('/admin/post', 'PostController@store')->name('post.store');
});
