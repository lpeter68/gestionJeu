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

    Route::group(['middleware' => 'approved'], function () {
        Route::get('/jeu', 'JeuController@create')->name('createJeu');
        Route::post('/jeu', 'JeuController@store')->name('storeJeu');
        Route::get('/listeJeu', 'JeuController@index')->name('getAllJeu');
        Route::get('/jeu/{id}', 'JeuController@edit')->where('id', '[0-9]+')->name('getJeu');
        Route::get('/imageJeu/{id}', 'JeuController@getImagePath')->where('id', '[0-9]+')->name('getJeuImage');
        Route::get('/supprimerJeu/{id}', 'JeuController@destroy')->where('id', '[0-9]+')->name('deleteJeu'); //TODO must be a patch

        Route::get('/partie', 'PartieController@create')->name('createPartie');
        Route::post('/partie', 'PartieController@store')->name('storePartie');
        Route::get('/listePartie', 'PartieController@index')->name('getAllPartie');
        Route::get('/partie/{id}', 'PartieController@edit')->where('id', '[0-9]+')->name('getPartie');
        Route::get('/supprimerPartie/{id}', 'PartieController@destroy')->where('id', '[0-9]+')->name('deletePartie'); //TODO must be a patch

        Route::get('/recherche', 'JeuController@search')->name('pageRecherche');
        Route::post('/recherche', 'JeuController@find')->name('rechercheJeu');

        Route::get('/label/interet', 'LabelController@getAllInteret')->name('getInteretLabel');
        Route::get('/label/regle', 'LabelController@getAllRegle')->name('getRegleLabel');
        Route::get('/label/etat', 'LabelController@getAllEtat')->name('getEtatLabel');

        Route::get('/autocomplete/nom', 'AutocompleteController@autocompletebyNom')->name('autocompleteNomJeu');
        Route::get('/autocomplete/editeur', 'AutocompleteController@autocompletebyEditeur')->name('autocompleteEditeur');
        Route::get('/autocomplete/joueur', 'AutocompleteController@autocompletebyJoueur')->name('autocompleteJoueur');
        Route::get('/autocomplete/user', 'AutocompleteController@autocompletebyUser')->name('autocompleteUser');

        Route::get('/roles', 'HomeController@roles')->name('roles');

        Route::group(['middleware' => 'admin'], function () {
            Route::prefix('admin')->group(function () {
                Route::get('/user', 'Admin\UserController@index')->name('listUser');
                Route::get('/user/update/{id}', 'Admin\UserController@modal')->name('modalUser');
                Route::post('/user/update', 'Admin\UserController@update')->name('updateUser');

                Route::get('/joueur', 'Admin\JoueurController@index')->name('listJoueur');
                Route::get('/joueur/update/{id}', 'Admin\JoueurController@modal')->name('modalJoueur');
                Route::post('/joueur/update', 'Admin\JoueurController@update')->name('updateJoueur');
            });
        });
    });
});

Route::get('/forbidden', 'ErrorController@forbidden')->name('forbidden');



