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

// Route::get('user/add', 'UserController@add');
// Route::post('user/add', 'UserController@create');
// Route::get('user/auth', 'UserController@getAuth');
// Route::post('user/auth', 'UserController@postAuth');
// Route::get('user/logout', 'Usercontroller@postLogout');

Auth::routes(['verify' => true]);

Route::get('test/index', 'TestController@index');
Route::get('test/index0', 'TestController@index0');
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', 'InfoController@top');
Route::get('/info/flow', 'InfoController@flow');
Route::get('/info/flow1', 'InfoController@flow1');
Route::get('/info/flow2', 'InfoController@flow2');
Route::get('/info/flow3', 'InfoController@flow3');
Route::get('/info/flow4', 'InfoController@flow4');
Route::get('/info/privacy_policy', 'InfoController@privacy_policy');
Route::get('/info/law_display', 'InfoController@law_display');
Route::get('/info/target_goods', 'InfoController@target_goods');
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
    Route::get('/entry/add', 'EntryController@add');
    Route::post('/entry/add', 'EntryController@create');
    Route::post('/entry/cancel_create', 'EntryController@cancel_create');

    Route::get('/approve/add', 'ApproveController@add');
    Route::post('/approve/add', 'ApproveController@create');
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
    // Route::get('user/edit', 'UserController@edit');
    // Route::post('user/edit', 'UserController@update');
    // Route::get('user/del', 'UserController@delete');
    // Route::post('user/del', 'UserController@remove');

    Route::get('entry/admin_index', 'EntryController@admin_index');
    Route::get('/entry/edit', 'EntryController@edit'); // 未実装
    Route::post('/entry/edit', 'EntryController@update');
    Route::get('/entry/del', 'EntryController@delete'); // 未実装
    Route::post('/entry/del', 'EntryController@remove');
    Route::get('entry/unify', 'EntryController@unify');

    Route::get('collection/admin_index', 'CollectionController@admin_index');
    Route::post('collection/applydone_add', 'CollectionController@applydone_create');
    Route::post('collection/cancel_for_apply', 'CollectionController@cancel_for_apply');
    Route::post('collection/cancel_for_no_arrival', 'CollectionController@cancel_for_no_arrival');

    Route::get('assessment/admin_index', 'AssessmentController@admin_index');
    Route::get('assessment/add', 'AssessmentController@add');
    Route::post('assessment/add', 'AssessmentController@create');
    Route::get('assessment/edit', 'AssessmentController@edit');
    Route::post('assessment/edit', 'AssessmentController@update');
    Route::get('assessment/del', 'AssessmentController@delete');
    Route::post('assessment/del', 'AssessmentController@remove');
    Route::post('assessment/assessmentdone_add', 'AssessmentController@assessmentdone_create');

    Route::get('assessmentdetail/admin_index', 'AssessmentdetailController@admin_index');
    Route::get('assessmentdetail/edit', 'AssessmentdetailController@edit');
    Route::post('assessmentdetail/edit', 'AssessmentdetailController@update');
    Route::get('assessmentdetail/del', 'AssessmentdetailController@delete');
    Route::post('assessmentdetail/del', 'AssessmentdetailController@remove');

    Route::get('resend/admin_index', 'ResendgoodsController@admin_index');
    Route::post('resend/add', 'ResendgoodsController@create');

    Route::get('paymentdone/admin_index', 'PaymentdoneController@admin_index');
    Route::post('paymentdone/add', 'PaymentdoneController@create');

    Route::get('receipt/admin_index', 'ReceiptController@admin_index');
    Route::get('receipt/add', 'ReceiptController@add');
    Route::post('receipt/add', 'ReceiptController@create');
    Route::get('receipt/edit', 'ReceiptController@edit');
    Route::post('receipt/edit', 'ReceiptController@update');
});
