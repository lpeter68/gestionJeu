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
     * @param String $colVal the column for valuewith data
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocompleteGeneral(Request $request, String $table, String $col, String $colVal = null)
    {
        if($colVal==null){
            $colVal=$col;
        }
        $term = $request->term;

        $queries = DB::table($table)
            ->where($col, 'like', '%'.$term.'%')
            ->take(6)->get();

        $results = array();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->$colVal]; //you can take custom values as you want
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

    /** Autocomplete with user from table user
     *
     * @param Request $request
     */
    public function autocompletebyUser(Request $request){
        return response()->json(AutocompleteController::autocompleteGeneral($request,'users','email'));
    }

    /** Autocomplete with joueur from table jeux
     *
     * @param Request $request
     */
    public function autocompletebyJoueur(Request $request){
        $resultSurnom = AutocompleteController::autocompleteGeneral($request,'joueurs','surnom');
        $resultPrenom = AutocompleteController::autocompleteGeneral($request,'joueurs','prenom','surnom');
        $resultNom = AutocompleteController::autocompleteGeneral($request,'joueurs','nom','surnom');
        return response()->json(AutocompleteController::mergeAutocomplet(AutocompleteController::mergeAutocomplet($resultSurnom,$resultPrenom),$resultNom));
    }

    public function mergeAutocomplet($array1, $array2){
       foreach ($array2 as $row2){
           $exist = false;
           foreach ($array1 as $row1) {
               if ($row1["id"] == $row2["id"]) {
                   $exist = true;
               }
           }
           if(!$exist) array_push($array1,$row2);
       }
       return $array1;
    }
}