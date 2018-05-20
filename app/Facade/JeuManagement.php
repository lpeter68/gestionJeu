<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 22/04/2018
 * Time: 15:10
 */

namespace App\Facade;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class JeuManagement
{
    public function rechercheMultiCritère(Request $request)
    {
        Log::Info("Début de recherche d'un jeu");
        $sql = DB::table('jeux');

        if($request->nom != null && $request->nom != "") {
            Log::Debug("Critère de recherche : nom ".$request->nom);
            $sql->where('nom', 'like', ('%' . $request->nom . '%'));
        }
        if($request->nombre_joueur != null && $request->nombre_joueur!="") {
            Log::Debug("Critère de recherche : nombre joueurs ".$request->nombre_joueur);
            $sql->where('nombre_joueur_min', '<=', $request->nombre_joueur)
                ->where('nombre_joueur_max', '>=', $request->nombre_joueur);
        }
        if($request->temps_jeu != null && $request->temps_jeu!="") {
            //TODO prendre en compte le temps de mise en place
            Log::Debug("Critère de recherche : temps de jeu ".$request->temps_jeu);
            $sql->where('temps_jeu', '<=', $request->temps_jeu);
        }
        if($request->regle != null && $request->regle!="") {
            Log::Debug("Critère de recherche : regle ".$request->regle);
            $sql->where('regle', '<=', $request->regle);
        }
        if($request->interet != null && $request->interet!="") {
            Log::Debug("Critère de recherche : interet ".$request->interet);
            $sql->where('interet', '>=', $request->interet);
        }
        if($request->age != null && $request->age!="") {
            Log::Debug("Critère de recherche : age ".$request->age);
            $sql->where('age', '>=', $request->age);
        }
        if($request->hasard== "on") {
            Log::Debug("Critère de recherche : hasard ".$request->hasard);
            $sql->where('hasard', '>=', $request->hasard);
        }

        if($request->strategie== "on") {
            Log::Debug("Critère de recherche : strategie ".$request->strategie);
            $sql->where('strategie', '=', $request->strategie);
        }

        if($request->des== "on") {
            Log::Debug("Critère de recherche : des ".$request->des);
            $sql->where('des', '=', $request->des);
        }

        if($request->cartes== "on") {
            Log::Debug("Critère de recherche : cartes ".$request->cartes);
            $sql->where('cartes', '=', $request->cartes);
        }

        if($request->adresse== "on") {
            Log::Debug("Critère de recherche : adresse ".$request->adresse);
            $sql->where('adresse', '=', $request->adresse);
        }

        if($request->questions== "on") {
            Log::Debug("Critère de recherche : questions ".$request->questions);
            $sql->where('questions', '=', $request->questions);
        }

        if($request->lettres== "on") {
            Log::Debug("Critère de recherche : lettres ".$request->lettres);
            $sql->where('lettres', '=', $request->lettres);
        }

        if($request->chiffres== "on") {
            Log::Debug("Critère de recherche : chiffres ".$request->chiffres);
            $sql->where('chiffres', '=', $request->chiffres);
        }

        if($request->equipes== "on") {
            Log::Debug("Critère de recherche : equipes ".$request->equipes);
            $sql->where('equipes', '=', $request->equipes);
        }

        if($request->cooperation== "on") {
            Log::Debug("Critère de recherche : cooperation ".$request->cooperation);
            $sql->where('cooperation', '=', $request->cooperation);
        }

        if($request->memoire== "on") {
            Log::Debug("Critère de recherche : memoire ".$request->memoire);
            $sql->where('memoire', '=', $request->memoire);
        }

        if($request->argent== "on") {
            Log::Debug("Critère de recherche : argent ".$request->argent);
            $sql->where('argent', '=', $request->argent);
        }

        if($request->point_victoire== "on") {
            Log::Debug("Critère de recherche : point_victoire ".$request->point_victoire);
            $sql->where('point_victoire', '=', $request->point_victoire);
        }

        if($request->edition!= null && $request->edition!="") {
            Log::Debug("Critère de recherche : edition ".$request->edition);
            $sql->where('edition', '=', $request->edition);
        }

        if($request->date_edition!= null && $request->date_edition!="") {
            Log::Debug("Critère de recherche : date_edition ".$request->date_edition);
            $sql->where('date_edition', '=', $request->date_edition);
        }

        if($request->etat!= null && $request->etat!="") {
            Log::Debug("Critère de recherche : etat ".$request->etat);
            $sql->where('etat', '>=', $request->etat);
        }

        if($request->pieces_manquantes == "on") {
            Log::Debug("Critère de recherche : pieces_manquantes ".$request->pieces_manquantes);
            $sql->whereNotNull('pieces_manquantes');
        }

        Log::Info("Fin de la recherche de jeu");
        return $sql->orderBy('id', 'asc')
            ->get();
    }
}