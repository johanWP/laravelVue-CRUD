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
    return view('home');
});

Route::post('/department/', 'DepartmentController@store')->name('department.store');
Route::delete('/department/delete/{id}', 'DepartmentController@destroy')->name('department.delete');
Route::get('/allQuery', 'QueryController@allQuery')->name('allQuery');