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
Route::get('/', 'HomeController@index'); //トップページ

Route::group(['middleware' => ['auth']], function(){
    //管理者
    Route::get('/admin', 'HomeController@add'); //カテゴリー追加
    Route::post('/admin/category', 'HomeController@store'); //カテゴリー保存
    Route::get('/admin/place', 'HomeController@search'); //場所検索
    Route::get('/admin/{place}/edit', 'HomeController@edit'); //場所情報編集
    Route::put('/admin/{place}/', 'HomeController@update'); //場所情報保存
     
    //マイページ
    Route::get('/mypage/wants', 'WantController@want'); //行きたい！一覧
    Route::get('/mypage/reviews', 'ReviewController@index'); //自分の投稿した評価一覧
    Route::get('/reviews/{place}', 'ReviewController@review'); //場所評価
    Route::post('/reviews/{place}', 'ReviewController@store'); //評価保存
    Route::get('/reviews/{review}/edit', 'ReviewController@edit'); //評価編集
    Route::put('/reviews/{review}/{place}', 'ReviewController@update'); //評価上書き保存
    Route::delete('/reviews/{review}/{place}', 'ReviewController@delete'); //評価削除
    Route::get('/mypage/setting', 'UserController@edit'); //ユーザー情報編集
    Route::get('/mypage/setting/password', 'UserController@passEdit'); //パスワード編集
    Route::put('/setting', 'UserController@profUpdate'); //ユーザー情報保存
    Route::put('/setting/password', 'UserController@passUpdate'); //パスワード保存
    Route::get('/mypage/schedule', 'ScheduleController@index'); //予定一覧・登録
    Route::post('/schedule', 'ScheduleController@store'); //予定保存
    Route::delete('/schedule/{schedule}', 'ScheduleController@delete'); //予定削除
    Route::get('/schedule/{schedule}/edit', 'ScheduleController@edit'); //予定編集
    Route::put('/schedule/{schedule}', 'ScheduleController@update'); //予定の上書き保存
    
    Route::post('/wants/{place}', 'WantController@store'); //行きたい登録
    Route::delete('/wants/{want}/{place}', 'WantController@delete'); //行きたい登録の解除
    
    Route::get('/bbses/{place}', 'CommentController@show'); //掲示板表示
    Route::post('/bbses/{place}', 'CommentController@store'); //掲示板投稿保存
    Route::delete('/comment/{comment}/{place}', 'CommentController@delete'); //掲示板投稿削除
    
    Route::get('/places/create', 'PlaceController@create'); //場所登録
    Route::post('/places', 'PlaceController@store'); //場所保存
});

Route::get('/bbses', 'CommentController@index'); //掲示板一覧表示

Route::get('/places/search', 'PlaceController@index'); //検索
Route::get('/places/ranking', 'PlaceController@ranking'); //ランキングページ
Route::get('/places/{place}', 'PlaceController@show'); //場所詳細

Auth::routes();