<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 28/04/2018
 * Time: 11:15
 */

namespace App\Http\Controllers;

use App\Model\Interet;
use App\Model\Etat;
use App\Model\Label;
use App\Model\Regle;

class LabelController
{
    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllInteret()
    {
        return Interet::all();
    }

    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRegle()
    {
        return Regle::all();
    }

    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllEtat()
    {
        return Etat::all();
    }

}