<?php

use Illuminate\Support\Facades\Route;

$path = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

// item
// ログインが必須であるページ
// Route::group(['middleware' => ['auth']], function () {
//     $path = 'App\Http\Controllers';
//     Route::get('item', "App\Http\Controllers\ItemController@index");
//     Route::get('item/find', "${path}\ItemController@find");
// });
Route::get('item', "${path}\ItemController@index");
Route::get('item/find', "${path}\ItemController@find");
Route::post('item/find', "${path}\ItemController@search");
Route::get('item/add', "${path}\ItemController@add");
Route::post('item/add', "${path}\ItemController@create");
Route::get('item/edit', "${path}\ItemController@edit");
Route::post('item/edit', "${path}\ItemController@update");
Route::get('item/delete', "${path}\ItemController@delete");
Route::post('item/delete', "${path}\ItemController@remove");

// user
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::group(['middleware' => 'auth:user'], function()
// {
   Route::get('user', 'App\Http\Controllers\UserController@index');
   Route::get('user/edit', 'App\Http\Controllers\UserController@edit');
   Route::post('user/edit', 'App\Http\Controllers\UserController@update');
   Route::get('user/delete', 'App\Http\Controllers\UserController@delete');
   Route::post('user/delete', 'App\Http\Controllers\UserController@remove');
// });

// order
Route::get('order', "${path}\OrderController@index");
Route::get('order/add', "${path}\OrderController@add");
Route::post('order/confirm', "${path}\OrderController@confirm");
Route::post('order/add', "${path}\OrderController@create");
Route::post('order/advance', "${path}\OrderController@advance");
