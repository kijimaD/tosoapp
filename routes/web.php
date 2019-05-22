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

Route::get('user/add', 'UserController@add');
Route::post('user/add', 'UserController@create');
Route::get('user/auth', 'UserController@getAuth');
Route::post('user/auth', 'UserController@postAuth');
Route::get('user/logout', 'Usercontroller@postLogout');

Auth::routes(['verify' => true]);
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', 'InfoController@top');
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user','middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/mypage', 'UserController@mypage')->name('user.mypage');

    Route::get('/address', 'AddressBookController@index');
    Route::get('/address/add', 'AddressBookController@add');
    Route::post('/address/add', 'AddressBookController@create');
    Route::get('/address/edit', 'AddressBookController@edit');
    Route::post('/address/edit', 'AddressBookController@update');
    Route::get('/address/del', 'AddressBookController@delete');
    Route::post('/address/del', 'AddressBookController@remove');
    Route::post('/address/default/add', 'AddressBookController@defaultCreate');

    Route::get('/bank', 'BankController@index');
    Route::get('/bank/add', 'BankController@add');
    Route::post('/bank/add', 'BankController@create');
    Route::get('/bank/edit', 'BankController@edit');
    Route::post('/bank/edit', 'BankController@update');
    Route::get('/bank/del', 'BankController@delete');
    Route::post('/bank/del', 'BankController@remove');
    Route::post('/bank/default/add', 'BankController@defaultCreate');

    Route::get('/entry', 'EntryController@index');
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
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');

    Route::get('admin/user', 'UserController@index');
    Route::get('user/edit', 'UserController@edit');
    Route::post('user/edit', 'UserController@update');
    Route::get('user/del', 'UserController@delete');
    Route::post('user/del', 'UserController@remove');
});
