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

Route::get('/', function () {
    return view('home');
});
Route::get('/mypage', function () {
    return view('mypage/schedule');
});

Route::get('/mypage/want', function() {
    return view('mypage/want');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
