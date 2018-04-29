<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 28/04/2018
 * Time: 11:15
 */

namespace App\Http\Controllers;

use App\Model\Label;

use Illuminate\Support\Facades\DB;

class LabelController
{
    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllInteret()
    {
        return DB::table('interet')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRegle()
    {
        return DB::table('regle')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Display listing of interest label
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllEtat()
    {
        return DB::table('etat')
            ->orderBy('id', 'asc')
            ->get();

    }

}