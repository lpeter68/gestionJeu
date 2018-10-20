<?php

namespace App\Http\Controllers;

use App\Model\Jeu;
use App\http\Requests\JeuRequest;
use App\Facade\PhotoManagement;
use App\Facade\JeuManagement;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
            return "";
        }
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

    /**Find games who match with the research
 *
 * @param Request $request
 * @param JeuManagement $jeuManagement
 * @return \Illuminate\Support\Collection
 */
    public function find(Request $request, JeuManagement $jeuManagement)
    {
        $jeu = $jeuManagement->rechercheMultiCritère($request);
        return view('resultatRechercheJeu')->with('jeux', $jeu);;
    }
}
