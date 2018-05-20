<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 14/05/2018
 * Time: 19:08
 */

namespace App\Model;


class Extension
{
    protected $table = 'extensions';

    protected $fillable = [
        'jeuDeBase',
        'extension',
        'numeroExtension',
    ];
}