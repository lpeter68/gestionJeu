<?php

namespace App\Http\Controllers\Admin;

use App\Model\Joueur;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::All();
        foreach ($joueurs as $joueur){
            if($joueur->applicationUser != null ) {
                $joueur->applicationUser = User::Find($joueur->applicationUser);
            }
        }
        return view('joueur/index')->with('joueurs', $joueurs);
    }

    public function modal($id)
    {
        if($id==0){
            $joueur = New Joueur();
        }else {
            $joueur = Joueur::Find($id);
            if ($joueur->applicationUser != null) {
                $joueur->applicationUser = User::Find($joueur->applicationUser);
            }
        }
        return view('joueur/modal')->with('joueur',$joueur);
    }

    public function update(Request $request)
    {
        if($request->input('id')!=0){
            $joueur = Joueur::Find($request->input('id'));
        }else{
            $joueur = new Joueur();
        }
        if($joueur!=null) {
            $joueur->nom = $request->input('firstName');
            $joueur->prenom = $request->input('lastName');
            $joueur->surnom = $request->input('surname');
            if ($request->input('applicationUser') != null) {
                $user = User::where('email', '=', $request->input('applicationUser'))->get();
                if ($user != null && $user[0] != null) {
                    $joueur->applicationUser = $user[0]->id;
                } else {
                    $joueur->applicationUser = null;
                }
            } else {
                $joueur->applicationUser = null;
            }
            $joueur->save();
        }else{
            return View('error/erreur400');
        }
        return JoueurController::index();
    }
}
