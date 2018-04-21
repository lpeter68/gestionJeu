@extends('template')

@section('contenu')
    <form action="{{ url('jeu') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="nom" id="nom">
        <input type="text" name="edition" id="edition">
        <input type="number" name="date_edition" id="date_edition">
        <input type="text" name="remarque" id="remarque">
        <input type="text" name="nombre_joueur_min" id="nombre_joueur_min">
        <input type="text" name="nombre_joueur_max" id="nombre_joueur_max">
        <input type="text" name="age" id="age">
        <input type="number" name="temps_jeu" id="temps_jeu">
        <input type="checkbox" name="hasard" id="hasard">
        <input type="checkbox" name="strategie" id="strategie">
        <input type="checkbox" name="des" id="des">
        <input type="checkbox" name="cartes" id="cartes">
        <input type="checkbox" name="adresse" id="adresse">
        <input type="checkbox" name="questions" id="questions">
        <input type="checkbox" name="lettres" id="lettres">
        <input type="checkbox" name="chiffres" id="chiffres">
        <input type="checkbox" name="equipes" id="equipes">
        <input type="checkbox" name="cooperation" id="cooperation">
        <input type="checkbox" name="memoire" id="memoire">
        <input type="checkbox" name="argent" id="argent">
        <input type="checkbox" name="point_victoire" id="point_victoire">
        <input type="text" name="interet" id="interet">
        <input type="text" name="etat" id="etat">
        <input type="text" name="regle" id="regle">
        <input type="text" name="mise_en_place" id="mise_en_place">
        <input type="text" name="pieces_manquantes" id="pieces_manquantes">
        <input type="text" name="divers" id="divers">
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Envoyer !">
    </form>
@endsection