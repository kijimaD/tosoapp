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


Route::get('/', 'InfoController@top');

Route::get('user', 'UserController@index');

Route::get('user/add', 'UserController@add');
Route::post('user/add', 'UserController@create');

Route::get('user/edit', 'UserController@edit');
Route::post('user/edit', 'UserController@update');

Route::get('user/del', 'UserController@delete');
Route::get('user/del', 'UserController@remove');

Route::get('user/auth', 'UserController@getAuth');
Route::post('user/auth', 'UserController@postAuth');
Route::get('user/logout', 'Usercontroller@postLogout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
