@extends('template')

@section('contenu')
    <form action="{{ url('jeu') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-5 show-border" id="divPhoto" style="overflow: hidden">
            <div class="image">
            <label for="photo" class="align-middle">
                    <img src="uploads/test 11.jpg" id="imgPhoto" class="img" />
                <!--img src="uploads/test 11.jpg" id="imgPhoto" style=" height: 300px"/-->
            </label>
            <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo" style="display: none">
            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class=" row col-sm-5">
        <label for="nom">@lang('contents.nom')</label>
        <input type="text" class="col-sm-11 form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom">
        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>

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

            <div class="col-sm-5">
                <label for="remarque">@lang('contents.remarque')</label>
                <input type="textArea" name="remarque" id="remarque">
                {!! $errors->first('remarque', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        <div class="row">
            <div class="col-sm-6">
                <label for="nombre_joueur_min">@lang('contents.nombre_joueur_min')</label>
                <input type="number" name="nombre_joueur_min" id="nombre_joueur_min" min="1" max="50">
                {!! $errors->first('nombre_joueur_min', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-sm-6">
                <label for="nombre_joueur_max">@lang('contents.nombre_joueur_max')</label>
                <input type="number" name="nombre_joueur_max" id="nombre_joueur_max" min="1" max="50">
                {!! $errors->first('nombre_joueur_max', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


        <div class="col-sm-5">
        <label for="age">@lang('contents.age')</label>
        <input type="text" name="age" id="age">
        {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="temps_jeu">@lang('contents.temps_jeu')</label>
        <input type="number" name="temps_jeu" id="temps_jeu" min="1" max="600">
        {!! $errors->first('temps_jeu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

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

        <div class="col-sm-5">
        <label for="interet">@lang('contents.interet')</label>
        <select name="interet" id="interet"></select>
        {!! $errors->first('interet', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="etat">@lang('contents.etat')</label>
        <select name="etat" id="etat" ></select>
        {!! $errors->first('etat', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="regle">@lang('contents.regle')</label>
        <select name="regle" id="regle"></select>
        {!! $errors->first('regle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="mise_en_place">@lang('contents.mise_en_place')</label>
        <input type="number" name="mise_en_place" id="mise_en_place" min="1" max="60">
        {!! $errors->first('mise_en_place', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="pieces_manquantes">@lang('contents.pieces_manquantes')</label>
        <input type="text" name="pieces_manquantes" id="pieces_manquantes">
        {!! $errors->first('pieces_manquantes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <label for="divers">@lang('contents.divers')</label>
        <input type="text" name="divers" id="divers">
        {!! $errors->first('divers', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
        <input type="submit" value="Envoyer !">
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

        remplirMenuDeroulant('{{route('getInteretLabel')}}','#interet');
        remplirMenuDeroulant('{{route('getEtatLabel')}}','#etat');
        remplirMenuDeroulant('{{route('getRegleLabel')}}','#regle');

        function remplirMenuDeroulant(route, jqueryID) {
            var jqxhr = $.ajax({
                type: 'get',    // on n'a pas de paramètres à envoyer alors GET est sécuritaire
                url: route,
                dataType: "html",    // le fichier php fait un echo de code HTML
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: ""

            })
            .done(function (response, textStatus, jqXHR) {
                var response= JSON.parse(response)
                var optionList ;
                for (var i=0;i<response.length;i++) {
                    optionList += "<option value="+response[i].id+">"+response[i].label+ "</option>";
                }
                $(jqueryID).html(optionList);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                $(jqueryID).html("<option value=''>Impossible de joindre le serveur</option>");
            });
        }
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