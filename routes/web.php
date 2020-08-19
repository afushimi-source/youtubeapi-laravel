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
    return view('welcome');
});

Route::get('/youtube/video','VideoController@index');
Route::get('/youtube/channel','ChannelController@index');

Route::get('/youtube/video/json/asc', 'VideoController@json_asc');
Route::get('/youtube/video/json/desc', 'VideoController@json_desc');
Route::get('/youtube/video/json/asc/{date}', 'VideoController@json_asc');
Route::get('/youtube/video/json/desc/{date}', 'VideoController@json_desc');
Route::get('/youtube/channel/json','ChannelController@json');