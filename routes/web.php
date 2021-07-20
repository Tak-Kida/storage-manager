<?php

use Illuminate\Support\Facades\Route;

$path = 'App\Http\Controllers';

Auth::routes();
// ログイン状態でのみアクセス可能
Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {
    // root
    Route::get('/', 'HomeController@index');
    // home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // order
    Route::get('order', 'OrderController@index');
});

// ログイン状態 かつ ３：在庫受注社 はアクセス不可
Route::group(['middleware' => ['auth','identify'], 'namespace' => 'App\Http\Controllers'], function () {
    // item
    Route::get('item', 'ItemController@index');
    Route::get('item/export', 'ItemController@csvExport');
    Route::get('item/find', 'ItemController@find');
    Route::post('item/find', 'ItemController@search');
    Route::get('item/add', 'ItemController@add');
    Route::post('item/add', 'ItemController@create');
    Route::get('item/edit', 'ItemController@edit');
    Route::post('item/edit', 'ItemController@update');
    Route::get('item/delete', 'ItemController@delete');
    Route::post('item/delete', 'ItemController@remove');

    //user
    Route::get('user', 'UserController@index');

    // order
    Route::get('order/add', 'OrderController@add');
    Route::post('order/add_confirm', 'OrderController@add_confirm');
    Route::post('order/add', 'OrderController@create');
    Route::post('order/advance', 'OrderController@advance');
    Route::get('order/edit', 'OrderController@edit');
    Route::post('order/edit_confirm', 'OrderController@edit_confirm');
    Route::post('order/edit', 'OrderController@update');
    Route::post('order/delete', 'OrderController@delete');
});

// ログイン状態 かつ ０：全権管理者のみアクセス可能
Route::group(['middleware' => ['auth','is_admin'], 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('user/edit', 'UserController@edit');
    Route::post('user/edit', 'UserController@update');
    Route::get('user/delete', 'UserController@delete');
    Route::post('user/delete', 'UserController@remove');
});
