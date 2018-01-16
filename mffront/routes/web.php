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

Route::get('/', 'ContentsController@home');
Route::get('/students', 'StudentsController@index');
Route::get('/students/new', 'StudentsController@newStudent');
Route::post('/students/new', 'StudentsController@create');
Route::get('/students/{students_id}', 'StudentsController@show');
