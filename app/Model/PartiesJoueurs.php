<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 14/05/2018
 * Time: 19:08
 */

namespace App\Model;


class PartiesJoueurs
{
    protected $table = 'parties_joueurs';

    protected $fillable = [
        'partie',
        'joueur',
        'equipe',
        'classement',
        'nbPoint',
    ];
}