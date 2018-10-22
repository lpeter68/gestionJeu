@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/remplirmenuDeroulant.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>

    <form  class="form-inline" action="{{ route('storeJeu') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}

        <label for="nom">@lang('contents.nom')</label>
        <div class="">
        <input type="text" class="col-sm-11 form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" value={{$jeu->nom}}>
        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="edition">@lang('contents.edition')</label>
        <input type="text" name="edition" class="form-control" id="edition" value={{$jeu->edition}}>
        {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="date_edition">@lang('contents.date_edition')</label>
        <input type="number" class="form-control" name="date_edition" id="date_edition" min="1850" value={{$jeu->date_edition}}>
        {!! $errors->first('date_edition', '<div class="invalid-feedback">:message</div>') !!}
        </div>

            <div class="col-sm-5">
                <label for="remarque">@lang('contents.remarque')</label>
                <input type="textArea" class="form-control" name="remarque" id="remarque" value={{$jeu->remarque}}>
                {!! $errors->first('remarque', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        <div class="row">
            <div class="col-sm-6">
                <label for="nombre_joueur_min">@lang('contents.nombre_joueur_min')</label>
                <input type="number" class="form-control" name="nombre_joueur_min" id="nombre_joueur_min" min="1" max="50" value={{$jeu->nombre_joueur_min}}>
                {!! $errors->first('nombre_joueur_min', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-6">
                <label for="nombre_joueur_max">@lang('contents.nombre_joueur_max')</label>
                <input type="number" class="form-control" name="nombre_joueur_max" id="nombre_joueur_max" min="1" max="50" value={{$jeu->nombre_joueur_max}}>
                {!! $errors->first('nombre_joueur_max', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


        <div class="col-sm-5">
        <label for="age">@lang('contents.age')</label>
        <input type="text" class="form-control" name="age" id="age" value={{$jeu->age}}>
        {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="temps_jeu">@lang('contents.temps_jeu')</label>
        <input type="number" class="form-control" name="temps_jeu" id="temps_jeu" min="1" max="600" value={{$jeu->temps_jeu}}>
        {!! $errors->first('temps_jeu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="hasard">@lang('contents.hasard')</label>
        <input type="checkbox" class="form-check-input" name="hasard" id="hasard" {{boolval($jeu->hasard)?"checked":"" }}>
        {!! $errors->first('hasard', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="strategie">@lang('contents.strategie')</label>
        <input type="checkbox" class="form-check-input" name="strategie" id="strategie" {{boolval($jeu->strategie) ? "checked":"" }}>
        {!! $errors->first('strategie', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="des">@lang('contents.des')</label>
        <input type="checkbox" class="form-check-input" name="des" id="des" {{boolval($jeu->des) ? "checked":"" }}>
        {!! $errors->first('des', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="cartes">@lang('contents.cartes')</label>
        <input type="checkbox" class="form-check-input" name="cartes" id="cartes" {{boolval($jeu->cartes)?"checked":"" }}>
        {!! $errors->first('cartes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="adresse">@lang('contents.adresse')</label>
        <input type="checkbox" class="form-check-input" name="adresse" id="adresse" {{boolval($jeu->adresse)?"checked":"" }}>
        {!! $errors->first('adresse', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="questions">@lang('contents.questions')</label>
        <input type="checkbox" class="form-check-input" name="questions" id="questions" {{boolval($jeu->questions)?"checked":"" }}>
        {!! $errors->first('questions', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="lettres">@lang('contents.lettres')</label>
        <input type="checkbox" class="form-check-input" name="lettres" id="lettres" {{boolval($jeu->lettres)?"checked":"" }}>
        {!! $errors->first('lettres', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="chiffres">@lang('contents.chiffres')</label>
        <input type="checkbox" class="form-check-input" name="chiffres" id="chiffres" {{boolval($jeu->chiffres)?"checked":"" }}>
        {!! $errors->first('chiffres', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="equipes">@lang('contents.equipes')</label>
        <input type="checkbox" class="form-check-input" name="equipes" id="equipes" {{boolval($jeu->equipes)?"checked":"" }}>
        {!! $errors->first('equipes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="cooperation">@lang('contents.cooperation')</label>
        <input type="checkbox" class="form-check-input" name="cooperation" id="cooperation" {{boolval($jeu->cooperation)?"checked":"" }}>
        {!! $errors->first('cooperation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="memoire">@lang('contents.memoire')</label>
        <input type="checkbox" class="form-check-input" name="memoire" id="memoire" {{boolval($jeu->memoire)?"checked":"" }}>
        {!! $errors->first('memoire', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="argent">@lang('contents.argent')</label>
        <input type="checkbox" class="form-check-input" name="argent" id="argent" {{boolval($jeu->argent)?"checked":"" }}>
        {!! $errors->first('argent', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="point_victoire">@lang('contents.point_victoire')</label>
        <input type="checkbox" class="form-check-input" name="point_victoire" id="point_victoire" {{boolval($jeu->point_victoire)?"checked":""}}>
        {!! $errors->first('point_victoire', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="interet">@lang('contents.interet')</label>
        <select name="interet" class="form-control" id="interet"></select>
        {!! $errors->first('interet', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="etat">@lang('contents.etat')</label>
        <select name="etat" class="form-control" id="etat" ></select>
        {!! $errors->first('etat', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="regle">@lang('contents.regle')</label>
        <select name="regle" class="form-control" id="regle"></select>
        {!! $errors->first('regle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="mise_en_place">@lang('contents.mise_en_place')</label>
        <input type="number" class="form-control" name="mise_en_place" id="mise_en_place" min="1" max="60" value={{$jeu->mise_en_place}}>
        {!! $errors->first('mise_en_place', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="pieces_manquantes">@lang('contents.pieces_manquantes')</label>
        <input type="text" class="form-control" name="pieces_manquantes" id="pieces_manquantes" value={{$jeu->pieces_manquantes}}>
        {!! $errors->first('pieces_manquantes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="divers">@lang('contents.divers')</label>
        <input type="text" class="form-control" name="divers" id="divers" value={{$jeu->divers}}>
        {!! $errors->first('divers', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <input type="hidden" value="{{$jeu->id}}" name="id">

        <div class="col-sm-5 show-border float-left" id="divPhoto" style="overflow: hidden">
            <div class="image">
                <label for="photo" class="align-middle">
                    <img src={{ asset('uploads/test.jpg') }} id="imgPhoto" class="img" />
                </label>
                <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo" style="display: none">
                {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-sm-5">
        <input type="submit" class="btn btn-primary" value="Envoyer !">
        </div>
    </form>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPhoto').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo").change(function() {
            readURL(this);
            $('.img').each(function(){ if($(this).outerWidth(true) <= $(this).outerHeight(true)) {
                //not as wide as tall
                alert($('#divPhoto').width);
                $(this).css({
                    "min-width": "",
                    "max-width": "",
                    "min-height": "100%",
                    "max-height": "100%"
                })
            }
            else {
                $(this).css({
                    "min-width": "100%",
                    "max-width": "100%",
                    "min-height": "",
                    "max-height": ""
                })
            }
            })
        });

        remplirMenuDeroulant('#interet','{{route('getInteretLabel')}}',{{$jeu->interet}});
        remplirMenuDeroulant('#etat','{{route('getEtatLabel')}}',{{$jeu->etat}});
        remplirMenuDeroulant('#regle', '{{route('getRegleLabel')}}',{{$jeu->regle}});
        addAutocomplete( '#nom', '{{route('autocompleteNomJeu')}}');
        addAutocomplete('#edition', '{{route('autocompleteEditeur')}}');

    </script>
    <style>
        .image{
            position:relative;
            overflow:hidden;
            padding-bottom:100%;
        }
        .image img{
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }

        .show-border{
            border: 3px #0b2e13 solid;
        }
    </style>
@endsection