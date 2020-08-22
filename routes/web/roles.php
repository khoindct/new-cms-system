<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('role.index');
Route::post('/roles', 'RoleController@store')->name('role.store');
Route::get('/roles/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::delete('/roles/{role}', 'RoleController@destroy')->name('role.delete');
Route::patch('/roles/{role}/update', 'RoleController@update')->name('role.update');
Route::patch('/roles/{role}/attach', 'RoleController@attach')->name('role.permission.attach');
Route::patch('/roles/{role}/detach', 'RoleController@detach')->name('role.permission.detach');
