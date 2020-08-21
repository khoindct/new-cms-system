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
    Route::get('/admin/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/admin/post/{post}', 'PostController@update')->name('post.update');
    Route::delete('/admin/post/{post}', 'PostController@destroy')->name('post.destroy');


    Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
    Route::patch('admin/users/{user}/update', 'UserController@update')->name('user.profile.update');

    Route::get('admin/users', 'UserController@index')->name('user.index');
    Route::delete('admin/users/{user}', 'UserController@destroy')->name('user.delete');
});
