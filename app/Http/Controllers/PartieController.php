<?php

namespace App\Http\Controllers;

use\App\Model\Partie;
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
        return Partie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partieForms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO traiter la requete pour tout avoir
        dd($request);
        Partie::create ($request);
        return view('partieForms');
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
