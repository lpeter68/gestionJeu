<?php

namespace App\Http\Controllers;

use App\Model\Jeu;
use App\http\Requests\JeuRequest;
use App\Facade\PhotoManagement;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Jeu::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeuForms');
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
        $requestData = $request->all();

        if($request->photo != null) {
            $requestData['photo'] = $photoManagement->save($request->photo, $request->nom);
        }

        Jeu::create ($requestData);
        return view('jeuForms');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Jeu::Find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        return view('rechercheJeu');
    }

    public function find(Request $request)
    {
        //TODO externalisé + prendre en compte recherche avancée
        $sql = DB::table('jeux');

        if($request->nom != null && $request->nom != "") {
            $sql->where('nom', 'like', ('%' . $request->nom . '%'));
        }
        if($request->nombre_joueur != null && $request->nombre_joueur!="") {
            $sql->where('nombre_joueur_min', '<=', $request->nombre_joueur)
                ->where('nombre_joueur_max', '>=', $request->nombre_joueur);
        }
        if($request->temps_jeu != null && $request->temps_jeu!="") {
            //TODO prendre en compte le temps de mise en place
            $sql->where('temps_jeu', '<=', $request->temps_jeu);
        }
        if($request->regle != null && $request->regle!="") {
            $sql->where('regle', '<=', $request->regle);
        }
        if($request->interet != null && $request->interet!="") {
            $sql->where('interet', '>=', $request->interet);
        }
        return $sql->orderBy('id', 'asc')
            ->get();
    }
}
