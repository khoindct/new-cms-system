<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permission.index');
Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permission.delete');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
Route::post('/permissions', 'PermissionController@store')->name('permission.store');
Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permission.delete');
Route::patch('/permissions/{permission}/update', 'PermissionController@update')->name('permission.update');
