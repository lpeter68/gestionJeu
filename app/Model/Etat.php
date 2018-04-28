<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 28/04/2018
 * Time: 11:48
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Etat extends Model
{
    protected $table = 'etat';
    protected $fillable = ['label'];
}