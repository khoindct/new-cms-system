<?php

use Illuminate\Support\Facades\Route;

Route::patch('users/{user}/update', 'UserController@update')->name('user.profile.update');

Route::delete('users/{user}', 'UserController@destroy')->name('user.delete');

Route::middleware('role:admin')->group(function() {
    Route::get('users', 'UserController@index')->name('user.index');
    Route::patch('users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::patch('users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

Route::middleware('can:view,user')->group(function() {
    Route::get('users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
