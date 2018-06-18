<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 18/06/2018
 * Time: 21:27
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Request;

class AutocompleteController
{
    /**Autocomplete any data from a table with the col specified in parameter
     *
     * @param Request $request
     * @param String $table the table containing data
     * @param String $col the column with data
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocompleteGeneral(Request $request, String $table, String $col)
    {
        $term = $request->term;

        $queries = DB::table($table)
            ->where($col, 'like', '%'.$term.'%')
            ->take(6)->get();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->$col]; //you can take custom values as you want
        }
        return response()->json($results);
    }

    /** Autocomplete with nom from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyNom(Request $request){
        return AutocompleteController::autocompleteGeneral($request,'jeux','nom');
    }

    /** Autocomplete with editeur from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyEditeur(Request $request){
        return AutocompleteController::autocompleteGeneral($request,'jeux','edition');
    }
}