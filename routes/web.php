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
Route::get("/demo","DemoController@demo");

Route::get('/admin',['as' => 'Admin',function(){
    return view('admin/index');
}]);

Route::get('/admin/user-table', 'AppChatController@listUsers')->name('tablesUsers');

Route::get('/admin/room-table', 'AppChatController@listRoom')->name('tablesRoom');

Route::get('/admin/user-room-table', 'AppChatController@listUserRoom')->name('tablesUserRoom');

Route::get('/admin/messages-table', 'AppChatController@listMessages')->name('tablesMessages');

