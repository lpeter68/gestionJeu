<?php

namespace App\Http\Controllers;

use App\Model\Jeu;
use App\http\Requests\JeuRequest;
use App\Facade\PhotoManagement;
use App\Facade\JeuManagement;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::all();
        return View('jeux/index')->with('jeux',$jeux);
    }

    /**
     * Edit or create if id = 0
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id==0){
            $jeu = new Jeu();
        }else{
            $jeu = Jeu::Find($id);
        }
        if($jeu ==null){
            return view('error/erreur400');
        }
        return view('jeux/jeuForms')->with('jeu',$jeu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facade\PhotoManagement
     * @return \Illuminate\Http\Response
     */
    public function store(JeuRequest $request, PhotoManagement $photoManagement)
    {
        $validatedData = $request->validate([
            'nom'  => 'required|alpha_num_spaces|max:255',
            'edition' => 'alpha_num_spaces|nullable',
            'date_edition' => 'alpha_num_spaces|nullable',
            'remarque' => 'alpha_num_spaces|nullable',
            'nombre_joueur_min' => 'numeric|nullable',
            'nombre_joueur_max' => 'numeric|nullable',
            'age' => 'integer|nullable',
            'temps_jeu' => 'integer|nullable',
            'hasard' => 'boolean',
            'strategie' => 'boolean',
            'des' => 'boolean',
            'cartes' => 'boolean',
            'adresse' => 'boolean',
            'questions' => 'boolean',
            'lettres' => 'boolean',
            'chiffres' => 'boolean',
            'equipes' => 'boolean',
            'cooperation' => 'boolean',
            'memoire' => 'boolean',
            'argent' => 'boolean',
            'point_victoire' => 'boolean',
            'interet' => 'required',
            'etat' => 'required',
            'regle' => 'required',
            'mise_en_place' => 'numeric|nullable',
            'pieces_manquantes' => 'alpha_num_spaces|nullable',
            'divers' => 'alpha_num_spaces|nullable',
            'photo' => 'file|nullable',
        ]);
        $requestData = $request->all();
        if($requestData['id'] != null && $requestData['id']!=0) {
            $jeu = Jeu::Find($requestData['id']);
        }else{
            $jeu =  New Jeu();
        }
        if($request->photo != null) {
            $requestData['photo'] = $photoManagement->save($request->photo, $request->nom);
        }
        $jeu->fill($requestData);
        //dd($jeu);
        $jeu->save();
        dd($jeu);
        return JeuController::edit($jeu->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Jeu::Find($id);
    }

    /**
     * Display image associated to specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getImagePath($id, PhotoManagement $photoManagement)
    {
        $jeu = Jeu::Find($id);
        if($jeu->photo != null) {
            return $photoManagement->load(Jeu::Find($id)->photo);
        }else{
            return asset('not-found.png');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jeu::Find($id)->delete();
        return "jeu supprimé";
    }

    /**
     * Find the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('jeux/rechercheJeu');
    }

    /**Find games who match with the research
 *
 * @param Request $request
 * @param JeuManagement $jeuManagement
 * @return \Illuminate\Support\Collection
 */
    public function find(Request $request, JeuManagement $jeuManagement)
    {
        $jeu = $jeuManagement->rechercheMultiCritère($request);
        return view('jeux/resultatRechercheJeu')->with('jeux', $jeu);;
    }
}
