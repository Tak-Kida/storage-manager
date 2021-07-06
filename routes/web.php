<?php

use Illuminate\Support\Facades\Route;

$path = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

Route::get('item', "${path}\ItemController@index");
Route::get('item/find', "${path}\ItemController@find");
Route::post('item/find', "${path}\ItemController@search");
Route::get('item/add', "${path}\ItemController@add");
Route::post('item/add', "${path}\ItemController@create");
Route::get('item/edit', "${path}\ItemController@edit");
Route::post('item/edit', "${path}\ItemController@update");
Route::get('item/delete', "${path}\ItemController@delete");
Route::post('item/delete', "${path}\ItemController@remove");
