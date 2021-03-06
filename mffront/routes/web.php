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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('admin')->group(function () {
  /* !! Reihenfolge !! */
  Route::get('/login', 'Auth\AdminsLoginController@showLoginForm')->name('admin_login');
  Route::post('/login', 'Auth\AdminsLoginController@login')->name('admin_login_submit');
  Route::get('/create', 'AdminsController@newUser')->name('new_user');
  Route::post('/create', 'AdminsController@newUser')->name('create_user');  //also changed
  Route::get('/list', 'AdminsController@userList')->name('userList');
  Route::delete('/delete{users_id}','AdminsController@destroy')->name('delete_user');

  Route::get('/logout', 'Auth\AdminsLoginController@logout')->name('admin_logout');


  Route::get('/{users_id}', 'AdminsController@show')->name('show_user');
  Route::post('/{users_id}', 'AdminsController@modify')->name('update_user');

  Route::get('', 'AdminsController@index')->name('admin_view');

});


// Route::middleware('auth')->group( function (){

  /* User Routing */
  //Route::get('/home', 'UserController@account')->name('user_account');
  //Route::get('/user/training', 'UserController@training')->name('training');

//});

Route::get('/user/logout', 'Auth\AdminsLoginController@userLogout')->name('user_logout');


Route::get('generate/password', function(){return bcrypt('123456789'); } );


/* Test Routing
Route::get('/student', 'StudentsController@index')->name('students');
Route::get('/students/create', 'StudentsController@newStudent')->name('new_student');
Route::post('/students/create', 'StudentsController@newStudent')->name('create_student'); //changed to newStudent
Route::get('/students/{student_id}', 'StudentsController@show')->name('show_student');
Route::post('/students/{student_id}', 'StudentsController@modify')->name('update_student');*/


//Route::get('/di', 'StudentsController@di');
