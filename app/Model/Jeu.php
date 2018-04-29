<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'jeux';

    protected $fillable = [
        'nom'
        , 'edition'
        ,'date_edition'
        ,'remarque'
        ,'nombre_joueur_min'
        ,'nombre_joueur_max'
        ,'age'
        ,'temps_jeu'
        ,'hasard'
        ,'strategie'
        ,'des'
        ,'cartes'
        ,'adresse'
        ,'questions'
        ,'lettres'
        ,'chiffres'
        ,'equipes'
        ,'cooperation'
        ,'memoire'
        ,'argent'
        ,'point_victoire'
        ,'interet'
        ,'etat'
        ,'regle'
        ,'mise_en_place'
        ,'pieces_manquantes'
        ,'divers'
        ,'photo'
    ];
}
