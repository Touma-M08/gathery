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
    Route::get('/', 'HomeController@index'); //トップページ
    
    //マイページ
    Route::get('/mypage/wants', 'WantController@want'); //行きたい！一覧
    Route::get('/reviews/{place}', 'ReviewController@review'); //場所評価
    Route::post('/reviews/{place}', 'ReviewController@store'); //評価保存
    
    
    Route::get('/places/search', 'PlaceController@index'); //検索
    Route::get('/places/create', 'PlaceController@create'); //場所登録
    Route::post('/places', 'PlaceController@store'); //場所保存
    Route::get('/places/ranking', 'PlaceController@ranking'); //ランキングページ
    Route::get('/places/{place}', 'PlaceController@show'); //場所詳細

    Route::post('/wants/{place}', 'WantController@store'); //行きたい登録
    
    Route::get('/bbses/{place}', 'CommentController@index'); //掲示板表示
    Route::post('/bbses/{place}', 'CommentController@store'); //掲示板投稿保存
});

Auth::routes();