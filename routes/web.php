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
Route::get('/description', function () {
    return view('description');
});

#Route::get('/test','TestController@index');
#Route::get('/test/{id}/{max?}','TestController@get_query');

#index
Route::get('/youtube/video','VideoController@index');
Route::get('/youtube/channel','ChannelController@index');
Route::get('/youtube/find','FindController@index');

#JSON
Route::get('/youtube/video/json/asc', 'VideoController@json_asc');
#Route::get('/youtube/video/json/desc', 'VideoController@json_desc');
Route::get('/youtube/video/json/asc/{date}', 'VideoController@json_asc');
#Route::get('/youtube/video/json/desc/{date}', 'VideoController@json_desc');
Route::get('/youtube/channel/json','ChannelController@json');

#channel detail
Route::get('youtube/channel/detail/{id}','ChannelController@detailInfo');

#find
Route::get('youtube/find/{str}','FindController@find');