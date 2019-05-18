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

Route::get('user', 'UserController@index')->middleware('verified');

Route::get('user/add', 'UserController@add');
Route::post('user/add', 'UserController@create');

Route::get('user/edit', 'UserController@edit');
Route::post('user/edit', 'UserController@update');

Route::get('user/del', 'UserController@delete');
Route::get('user/del', 'UserController@remove');

Route::get('user/auth', 'UserController@getAuth');
Route::post('user/auth', 'UserController@postAuth');
Route::get('user/logout', 'Usercontroller@postLogout');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/home');
});

/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/home');
    });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});
