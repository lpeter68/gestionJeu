<?php

namespace App\Http\Controllers;

use\App\Model\Partie;
use App\Model\PartiesJoueurs;
use Illuminate\Http\Request;

class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Partie::all();
        return View('parties/index')->with('parties',$parties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parties/partieForms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            TODO valider
        ]);*/
        //TODO traiter la requete pour tout avoir
        $requestData = json_decode($request->all()['jsonData']);

        $partie = new  Partie();
        $partie->jeu = $requestData->jeu;
        $partie->date = $requestData->date;
        $equipes = $requestData->equipes;
        $nbJoueur = 0;
        $partie->nbEquipe = count($equipes);
        foreach ($equipes as $equipe){
            $equipenum = uniqid ();
            $nbJoueur += count($equipe->joueurs);
            foreach ($equipe->joueurs as $joueur){
                $partie_joueur = new PartiesJoueurs();
                $partie_joueur->joueur = $joueur;
                $partie_joueur->equipe = $equipenum;
                $partie_joueur->classement = array_search($equipe,$equipes)+1;
                $partie_joueur->nbPoint = $equipe->score;
                dd($partie_joueur);
            }
        }
        $partie->nbJoueur = $nbJoueur;
        dd($partie);
        Partie::create ($request);
        return view('parties/partieForms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Partie::Find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Partie::Find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partie $partie)
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
}
