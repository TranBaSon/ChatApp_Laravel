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

use Illuminate\Support\Facades\Route;

Route::get("/demo","DemoController@demo");

Route::get('/admin',['as' => 'Admin',function(){
    return view('admin/index');
}]);

Route::get('/admin/users-table', 'AppChatController@listUsers')->name('tablesUsers');

Route::get('/admin/room-table', 'AppChatController@listRoom')->name('tablesRoom');

Route::get('/admin/users-room-table', 'AppChatController@listUserRoom')->name('tablesUserRoom');

Route::get('/admin/messages-table', 'AppChatController@listMessages')->name('tablesMessages');

Route::get('/','AppChatController@homeChat')->middleware('auth');

Route::post('/','AppChatController@sendMess')->name('sendMess');


Route::get('/registerUser','AppChatController@userRegister');

Route::post('/registerUser','AppChatController@userRegister_post')->name('registerUser');

Route::get('/editUser/{id_user}','AppChatController@userEdit');

Route::post('/editUser','AppChatController@userEdit_post')->name('editUser');

Route::get('/removeUser/{id_user}','AppChatController@removeUser');


Route::get('/addRoom','AppChatController@addRoom');
Route::post('/addRoom','AppChatController@addRoom_post')->name('addRoom');

Route::get('/editRoom/{id_room}','AppChatController@editRoom');
Route::post('/editRoom','AppChatController@editRoom_post')->name('editRoom');

Route::get('/removeRoom/{id_room}','AppChatController@removeRoom');


Route::get('/file', 'AppChatController@file');

Route::post('/file', 'AppChatController@fileUp')->name('file');


Route::get('/login','AppChatController@login');
Route::post('/login','AppChatController@loginPost')->name('login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transondataapi','AppChatController@data');

Route::get('/createRoom','AppChatController@createRoom');
Route::post('/create-room','AppChatController@create_room');


