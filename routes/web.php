<?php

use Illuminate\Support\Facades\Route;

$path = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

Route::get('item', "${path}\ItemController@index");
Route::get('item/add', "${path}\ItemController@add");
Route::post('item/add', "${path}\ItemController@create");
