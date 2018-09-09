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

        $results = array();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->$col]; //you can take custom values as you want
        }
        return $results;
    }

    /** Autocomplete with nom from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyNom(Request $request){
        return response()->json(AutocompleteController::autocompleteGeneral($request,'jeux','nom'));
    }

    /** Autocomplete with editeur from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyEditeur(Request $request){
        return response()->json(AutocompleteController::autocompleteGeneral($request,'jeux','edition'));
    }

    /** Autocomplete with joueur from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyJoueur(Request $request){
        $resultSurnom = AutocompleteController::autocompleteGeneral($request,'joueurs','surnom');
        $resultPrenom = AutocompleteController::autocompleteGeneral($request,'joueurs','prenom');
        $resultNom = AutocompleteController::autocompleteGeneral($request,'joueurs','nom');
        return response()->json(AutocompleteController::mergeAutocomplet($resultSurnom,$resultPrenom));
    }

    public function mergeAutocomplet($array1, $array2){
    //TODO trouver l'erreur.
       foreach ($array2 as $row2){
           $exist = false;
           foreach ($array1 as $row1) {
               if (($row1[id]) . contains($row2[id])) {
                   $exist = true;
               }
           }
           if(!$exist) $array1.add($row2);
       }
       return $array1;
    }
}