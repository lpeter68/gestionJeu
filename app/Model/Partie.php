<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 14/05/2018
 * Time: 19:05
 */

namespace App\Model;


class Partie
{
    protected $table = 'parties';

    protected $fillable = [
        'jeu',
        'date',
        'nbJoueur',
        'nbEquipes',
        'duree',
        'divers',
    ];
}