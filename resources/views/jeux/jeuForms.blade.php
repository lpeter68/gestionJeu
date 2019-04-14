@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/remplirmenuDeroulant.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>

    <form id="form" class="" action="{{ route('storeJeu') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <div class="row col-sm-12">
                        <label for="nom">@lang('contents.nom')</label>
                        <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" value="{{old('nom')?:$jeu->nom}}">
                        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="edition">@lang('contents.edition')</label>
                            <input type="text" name="edition" class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" id="edition" value={{old('edition')?:$jeu->edition}}>
                            {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="">
                            <label for="date_edition">@lang('contents.date_edition')</label>
                            <input type="number" class="form-control {{ $errors->has('date_edition') ? 'is-invalid' : '' }}" name="date_edition" id="date_edition" min="1850" value={{old('date_edition')?:$jeu->date_edition}}>
                            {!! $errors->first('date_edition', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nombre_joueur_min" >@lang('contents.nombre_joueur_min')</label>
                            <input type="number" class="form-control {{ $errors->has('nombre_joueur_min') ? 'is-invalid' : '' }}" name="nombre_joueur_min" id="nombre_joueur_min" min="1" max="50" value={{old('nombre_joueur_min')?:$jeu->nombre_joueur_min}}>
                            {!! $errors->first('nombre_joueur_min', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-sm-4">
                            <label for="nombre_joueur_max">@lang('contents.nombre_joueur_max')</label>
                            <input type="number" class="form-control {{ $errors->has('nombre_joueur_max') ? 'is-invalid' : '' }}" name="nombre_joueur_max" id="nombre_joueur_max" min="1" max="50" value={{old('nombre_joueur_max')?:$jeu->nombre_joueur_max}}>
                            {!! $errors->first('nombre_joueur_max', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-sm-4">
                            <label for="age">@lang('contents.age')</label>
                            <input type="text" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" id="age" value={{old('age')?:$jeu->age}}>
                            {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-sm-5">
                            <label for="temps_jeu">@lang('contents.temps_jeu')</label>
                            <input type="number" class="form-control {{ $errors->has('temps_jeu') ? 'is-invalid' : '' }}" name="temps_jeu" id="temps_jeu" min="1" max="600" value={{old('temps_jeu')?:$jeu->temps_jeu}}>
                            {!! $errors->first('temps_jeu', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class=" col-sm-5">
                            <label for="mise_en_place">@lang('contents.mise_en_place')</label>
                            <input type="number" class="form-control {{ $errors->has('mise_en_place') ? 'is-invalid' : '' }}" name="mise_en_place" id="mise_en_place" min="1" max="60" value={{old('mise_en_place')?:$jeu->mise_en_place}}>
                            {!! $errors->first('mise_en_place', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="remarque">@lang('contents.remarque')</label>
                            <input type="textArea" class="form-control {{ $errors->has('remarque') ? 'is-invalid' : '' }}" name="remarque" id="remarque" value={{old('remarque')?:$jeu->remarque}}>
                            {!! $errors->first('remarque', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    @include('common/jeuTypes')

                    <br>
                    <div class="row">
                        <div class=" col-sm-4">
                            <label for="interet">@lang('contents.interet')</label>
                            <select name="interet" class="form-control {{ $errors->has('interet') ? 'is-invalid' : '' }}" id="interet"></select>
                            {!! $errors->first('interet', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class=" col-sm-4">
                            <label for="etat">@lang('contents.etat')</label>
                            <select name="etat" class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" id="etat"></select>
                            {!! $errors->first('etat', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class=" col-sm-4">
                            <label for="regle">@lang('contents.regle')</label>
                            <select name="regle" class="form-control {{ $errors->has('regle') ? 'is-invalid' : '' }}" id="regle"></select>
                            {!! $errors->first('regle', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                        <div class=" col-sm-12">
                            <label for="pieces_manquantes">@lang('contents.pieces_manquantes')</label>
                            <input type="text" class="form-control {{ $errors->has('pieces_manquantes') ? 'is-invalid' : '' }}" name="pieces_manquantes" id="pieces_manquantes" value={{old('pieces_manquantes')?:$jeu->pieces_manquantes}}>
                            {!! $errors->first('pieces_manquantes', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class=" col-sm-12">
                            <label for="divers">@lang('contents.divers')</label>
                            <input type="text" class="form-control {{ $errors->has('divers') ? 'is-invalid' : '' }}" name="divers" id="divers" value={{old('divers')?:$jeu->divers}}>
                            {!! $errors->first('divers', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group col-sm-12 show-border float-left" id="divPhoto" style="overflow: hidden">
                            <div class="image">
                                <!--TODO récupérer le fichier-->
                                <label for="photo" class="align-middle">
                                    <img src={{ asset('not-found.png') }} id="imgPhoto" class="img" value={{old('imgPhoto')?:$jeu->imgPhoto}}/>
                                </label>
                                <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo" style="display: none">
                                {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{old('id')?:$jeu->id}}" name="id">
            </div>
            <div class="col-sm-5">
                <input type="button" class="submit btn btn-primary" value="Envoyer !">
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

        $(".submit").click(function() {
            convertTypeData('#form');
            $('#form').submit();
        })

        $("#photo").change(function() {
            readURL(this);
            $('.img').each(function(){ if($(this).outerWidth(true) <= $(this).outerHeight(true)) {
                //not as wide as tall
                //alert($('#divPhoto').width);
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

        remplirMenuDeroulant('#interet','{{route('getInteretLabel')}}',{{old('interet')?:$jeu->interet}});
        remplirMenuDeroulant('#etat','{{route('getEtatLabel')}}',{{old('etat')?:$jeu->etat}});
        remplirMenuDeroulant('#regle', '{{route('getRegleLabel')}}',{{old('regle')?:$jeu->regle}});
        addAutocomplete( '#nom', '{{route('autocompleteNomJeu')}}');
        addAutocomplete('#edition', '{{route('autocompleteEditeur')}}');
        var js_data = '<?php echo json_encode($jeu); ?>';
        var js_obj_data = JSON.parse(js_data);
        loadType(js_obj_data);

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

        .row{
            margin-bottom: 5px;
        }
    </style>
@endsection