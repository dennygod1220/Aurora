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

use Illuminate\Http\Request;

Auth::routes();

Route::get('/test', 'testController@index');

// 首頁  內頁跟首頁為同一頁，是首頁的下半部
Route::get('/', function () {
    return view('index');
});

//活動辦法
Route::get('/ActivityMethod', function () {
    return view('ActivityMethod');
});

//我要參加
Route::get('/IWantJoin', 'IWantJoinController@index')->middleware('UserIsCheck');

//登入驗證email 頁面
Route::get('/LoginEmail', function (Request $req) {
    $email_status = $req->session()->get('email_status');
    //判斷是否進行過Email驗證過身分
    if ($email_status != 'success') {
        return view('Login.user_info');
    } else {
        return redirect('/IWantJoin');
    }
});
//接收 登入驗證Email的ˊ資訊
Route::post('/LoginEmail', 'UserinfoController@check');

//ajax 儲存拉霸機結果
Route::post('/slot_result','IWantJoinController@store_result');