<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 14/05/2018
 * Time: 19:05
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Partie extends Model
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