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



Route::get('manager', 'NewsController@list')->name('manager')->middleware('auth');
Route::resource('manager', 'NewsController')->only([
    'create', 'store', 'update', 'edit', 'destroy'
])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
