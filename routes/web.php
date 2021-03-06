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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/publica', 'PublicaController@publica');

Route::post('/foto','HomeController@foto');

Route::get('/eliminarPublica/{id}','PublicaController@destroy');

Route::get('/siguiendo/{id}', 'UserController@siguiendo');
