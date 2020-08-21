<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permission.index');
Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permission.delete');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
