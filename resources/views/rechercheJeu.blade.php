@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/remplirmenuDeroulant.js') }}"></script>

    <form action="{{ route('rechercheJeu') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class=" row col-sm-5">
            <label for="nom">@lang('contents.nom')</label>
            <input type="text" class="col-sm-11 form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom">
            {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-6">
            <label for="nombre_joueur">@lang('contents.nombre_joueur')</label>
            <input type="number" name="nombre_joueur" id="nombre_joueur" min="1" max="50">
            {!! $errors->first('nombre_joueur', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
            <label for="temps_jeu">@lang('contents.temps_jeu_et_mise_en_place')</label>
            <input type="number" name="temps_jeu" id="temps_jeu" min="1" max="600">
            {!! $errors->first('temps_jeu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
            <label for="interet">@lang('contents.interet')</label>
            <select name="interet" id="interet"></select>
            {!! $errors->first('interet', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
            <label for="regle">@lang('contents.regle')</label>
            <select name="regle" id="regle"></select>
            {!! $errors->first('regle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
            <input type="button" id="bouttonRechercheAvancee" value="@lang('contents.recherche_Avancee')">
        </div>

        <div id="rechercheAvancee" style="display: none">
            <div class="col-sm-5">
                <label for="age">@lang('contents.age')</label>
                <input type="text" name="age" id="age">
                {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div id="categorieJeu">
                <div class="col-sm-5">
                    <label for="hasard">@lang('contents.hasard')</label>
                    <input type="checkbox" name="hasard" id="hasard">
                    {!! $errors->first('hasard', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="strategie">@lang('contents.strategie')</label>
                    <input type="checkbox" name="strategie" id="strategie">
                    {!! $errors->first('strategie', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="des">@lang('contents.des')</label>
                    <input type="checkbox" name="des" id="des">
                    {!! $errors->first('des', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="cartes">@lang('contents.cartes')</label>
                    <input type="checkbox" name="cartes" id="cartes">
                    {!! $errors->first('cartes', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="adresse">@lang('contents.adresse')</label>
                    <input type="checkbox" name="adresse" id="adresse">
                    {!! $errors->first('adresse', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="questions">@lang('contents.questions')</label>
                    <input type="checkbox" name="questions" id="questions">
                    {!! $errors->first('questions', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="lettres">@lang('contents.lettres')</label>
                    <input type="checkbox" name="lettres" id="lettres">
                    {!! $errors->first('lettres', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="chiffres">@lang('contents.chiffres')</label>
                    <input type="checkbox" name="chiffres" id="chiffres">
                    {!! $errors->first('chiffres', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="equipes">@lang('contents.equipes')</label>
                    <input type="checkbox" name="equipes" id="equipes">
                    {!! $errors->first('equipes', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="cooperation">@lang('contents.cooperation')</label>
                    <input type="checkbox" name="cooperation" id="cooperation">
                    {!! $errors->first('cooperation', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="memoire">@lang('contents.memoire')</label>
                    <input type="checkbox" name="memoire" id="memoire">
                    {!! $errors->first('memoire', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="argent">@lang('contents.argent')</label>
                    <input type="checkbox" name="argent" id="argent">
                    {!! $errors->first('argent', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="point_victoire">@lang('contents.point_victoire')</label>
                    <input type="checkbox" name="point_victoire" id="point_victoire">
                    {!! $errors->first('point_victoire', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div id="editionJeu">
                <div class="row col-sm-5">
                    <label for="edition">@lang('contents.edition')</label>
                    <input type="text" name="edition" id="edition">
                    {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="date_edition">@lang('contents.date_edition')</label>
                    <input type="number" name="date_edition" id="date_edition" min="1850" >
                    {!! $errors->first('date_edition', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div id="apparenceJeu">
                <div class="col-sm-5">
                    <label for="etat">@lang('contents.etat')</label>
                    <select name="etat" id="etat" ></select>
                    {!! $errors->first('etat', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-sm-5">
                    <label for="pieces_manquantes">@lang('contents.contient_des_pieces_manquantes')</label>
                    <input type="checkbox" name="pieces_manquantes" id="pieces_manquantes">
                    {!! $errors->first('pieces_manquantes', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <input type="submit" value="Rechercher !">
        </div>
    </form>

    <script>
        remplirMenuDeroulant('{{route('getInteretLabel')}}','#interet');
        remplirMenuDeroulant('{{route('getEtatLabel')}}','#etat');
        remplirMenuDeroulant('{{route('getRegleLabel')}}','#regle');

        $("#bouttonRechercheAvancee").click(function() {
            if(document.getElementById("rechercheAvancee").style.display === 'none'){
                document.getElementById("rechercheAvancee").style.display = 'block';
            }else{
                document.getElementById("rechercheAvancee").style.display = 'none';
            }
        });
    </script>

@endsection