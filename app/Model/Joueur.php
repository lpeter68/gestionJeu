<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 14/05/2018
 * Time: 19:03
 */

namespace App\Model;


class Joueur
{
    protected $table = 'joueurs';

    protected $fillable = [
        'nom',
        'prenom',
        'surnom',
    ];
}