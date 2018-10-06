@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <form action="{{ route('storePartie') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}

        <div class=" row col-sm-5">
            <label for="jeu">@lang('contents.nom')</label>
            <input type="text" class="col-sm-11 form-control {{ $errors->has('jeu') ? 'is-invalid' : '' }}" name="jeu" id="jeu">
            {!! $errors->first('jeu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class=" row col-sm-5">
            <label for="date">@lang('contents.datePartie')</label>
            <input type="date" class="col-sm-11 form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" name="date" id="date">
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
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

        <div id="listeJoueurs">
        </div>
        <a id="addEquipeButton" onclick="addEquipe()"><i class="fa fa-plus-circle" style="font-size:36px;color:     #007bff"></i></a>

        <div class="col-sm-5">
            <input type="submit" value="Envoyer !">
        </div>
    </form>

    <script>
        var n= [1];
        var idEquipe=1;
        addEquipe();
        addAutocomplete( '#jeu', '{{route('autocompleteNomJeu')}}');
        $('#date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'mm-dd-yyyy'
        });

        function addJoueur(a) {
            if(n.length>=a){
                n.push(1);
            }
            $("#content_"+a).append('<input type="text" class="form-control col-10 mb-3" >');
            n[a]++;
        }

        function addEquipe(){
            if(idEquipe<=1 || !$('#cooperation').is(':checked')) {
                $("#listeJoueurs").append('<div class="card cardEquipe border-primary mb-3 ml-3 mr-3 mt-3">' +
                    '<div class="card-body" id="body">' +
                    '<h5 class="card-title">@lang('contents.equipe') ' + idEquipe + '<input type="text" class="form-control col-1 float-sm-right"></h5>' +
                    '<span id="content_' + idEquipe + '">' +
                    '<p>@lang('contents.joueurs')</p>' +
                    '</span>' +
                    '<a onclick="addJoueur(' + idEquipe + ')"><i class="fa fa-plus-circle" style="font-size:36px;color:#007bff"></i></a>' +
                    '</div>' +
                    '</div>');
                addJoueur(idEquipe);
                idEquipe++;
            }
        }

        $('#cooperation').click(function(){
            if ($(this).is(':checked')) {
                $("#addEquipeButton").hide();
                $(".cardEquipe").hide();
            }else{
                $("#addEquipeButton").show();
                $(".cardEquipe").show();
            }
        });
    </script>
@endsection