@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/remplirmenuDeroulant.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>

    <form id="form" action="{{ route('rechercheJeu') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    {{ csrf_field() }}
        <div class="form-group">
            <div class=" row col-sm-5">
                <label for="nom">@lang('contents.nom')</label>
                <input type="text" class="col-sm-11 form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom">
                {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-6">
                <label for="nombre_joueur">@lang('contents.nombre_joueur')</label>
                <input type="number" class="form-control" name="nombre_joueur" id="nombre_joueur" min="1" max="50">
                {!! $errors->first('nombre_joueur', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-5">
                <label for="temps_jeu">@lang('contents.temps_jeu_et_mise_en_place')</label>
                <input type="number" class="form-control" name="temps_jeu" id="temps_jeu" min="1" max="600">
                {!! $errors->first('temps_jeu', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-5">
                <label for="interet">@lang('contents.interet')</label>
                <select name="interet" class="form-control" id="interet"></select>
                {!! $errors->first('interet', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-5">
                <label for="regle">@lang('contents.regle')</label>
                <select name="regle" class="form-control" id="regle"></select>
                {!! $errors->first('regle', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-5">
                <input type="button" class="btn btn-primary top-margin" id="bouttonRechercheAvancee" value="@lang('contents.recherche_Avancee')">
            </div>

            <div id="rechercheAvancee" style="display: none">
                <div class="col-sm-5">
                    <label for="age">@lang('contents.age')</label>
                    <input type="text" class="form-control" name="age" id="age">
                    {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                @include('common/jeuTypes')

                <div id="editionJeu">
                    <div class="row col-sm-5">
                        <label for="edition">@lang('contents.edition')</label>
                        <input type="text" class="form-control" name="edition" id="edition">
                        {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-sm-5">
                        <label for="date_edition">@lang('contents.date_edition')</label>
                        <input type="number" class="form-control" name="date_edition" id="date_edition" min="1850" >
                        {!! $errors->first('date_edition', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div id="apparenceJeu">
                    <div class="col-sm-5">
                        <label for="etat">@lang('contents.etat')</label>
                        <select name="etat" class="form-control" id="etat" ></select>
                        {!! $errors->first('etat', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-sm-5">
                        <label for="pieces_manquantes">@lang('contents.contient_des_pieces_manquantes')</label>
                        <input type="checkbox" class="form-check-input" name="pieces_manquantes" id="pieces_manquantes">
                        {!! $errors->first('pieces_manquantes', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <input type="submit" class="submit btn btn-primary top-margin" value="Rechercher !">
            </div>
        </div>
    </form>

    <script>
        remplirMenuDeroulant('#interet', '{{route('getInteretLabel')}}');
        remplirMenuDeroulant('#etat', '{{route('getEtatLabel')}}');
        remplirMenuDeroulant('#regle', '{{route('getRegleLabel')}}');
        addAutocomplete( '#nom', '{{route('autocompleteNomJeu')}}');
        addAutocomplete('#edition', '{{route('autocompleteEditeur')}}');

        $("#bouttonRechercheAvancee").click(function() {
            if(document.getElementById("rechercheAvancee").style.display === 'none'){
                document.getElementById("rechercheAvancee").style.display = 'block';
            }else{
                document.getElementById("rechercheAvancee").style.display = 'none';
            }
        });

        $(".submit").click(function() {
            convertTypeData('#form');
        })
    </script>

@endsection