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
    Route::get('/jeu', 'JeuController@create')->name('createJeu');
    Route::post('/jeu', 'JeuController@store')->name('storeJeu');
    Route::get('/recherche', 'JeuController@search')->name('pageRecherche');
    Route::post('/recherche', 'JeuController@find')->name('rechercheJeu');
    Route::get('/listeJeu', 'JeuController@index')->name('getAllJeu');
    Route::get('/jeu/{id}', 'JeuController@edit')->where('id', '[0-9]+')->name('getJeu');
    Route::get('/supprimerJeu/{id}', 'JeuController@destroy')->where('id', '[0-9]+'); //TODO must be a patch
    Route::get('/label/interet', 'LabelController@getAllInteret')->name('getInteretLabel');
    Route::get('/label/regle', 'LabelController@getAllRegle')->name('getRegleLabel');
    Route::get('/label/etat', 'LabelController@getAllEtat')->name('getEtatLabel');
});


