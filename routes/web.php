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

Route::get('/', 'NewsController@index');
Route::get('/show/{id}', 'NewsController@show');

Route::resource('manager', 'NewsController')->only([
    'create', 'store', 'update', 'destroy'
]); //->middleware('auth');
