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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/jeu', 'JeuController@create');
    Route::post('/jeu', 'JeuController@store');
    Route::get('/listeJeu', 'JeuController@index');
    Route::get('/jeu/{id}', 'JeuController@edit')->where('id', '[0-9]+');
    Route::get('/supprimerJeu/{id}', 'JeuController@destroy')->where('id', '[0-9]+'); //TODO must be a patch
});


