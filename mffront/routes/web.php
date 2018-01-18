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

Route::get('/', 'ContentsController@home')->name('welcome');

/* User Routing */
Route::get('/user', 'UserController@account')->name('user_account');
Route::get('/user/training', 'UserController@training')->name('training');

/* Admin Routing */
Route::get('/admin', 'AdminsController@admin')->name('admin_view');
Route::get('/admin/alter', 'AdminsController@alter')->name('alter_user');
Route::get('/admin/create', 'AdminsController@newUser')->name('new_user');
Route::post('/admin/create', 'AdminsController@newUser')->name('create_user');  //also changed
Route::get('/admin/{user_id}', 'AdminsController@show')->name('show_user');
Route::post('/admin/{user_id}', 'AdminsController@modify')->name('update_user');

/* Test Routing */
Route::get('/student', 'StudentsController@index')->name('students');
Route::get('/students/create', 'StudentsController@newStudent')->name('new_student');
Route::post('/students/create', 'StudentsController@newStudent')->name('create_student'); //changed to newStudent
Route::get('/students/{student_id}', 'StudentsController@show')->name('show_student');
Route::post('/students/{student_id}', 'StudentsController@modify')->name('update_student');


Route::get('/di', 'StudentsController@di');
