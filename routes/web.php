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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/mypage', 'HomeController@want');
    Route::get('/', 'HomeController@index'); //トップページ
    
    Route::get('/places/search', 'PlaceController@index'); //検索
    Route::get('/places/search/{prefecture}', 'PlaceController@index');
    Route::get('/places/create', 'PlaceController@create'); //場所登録
    Route::post('/places', 'PlaceController@store'); //場所保存
    Route::get('/places/{place}', 'PlaceController@show'); //場所詳細
});

Auth::routes();