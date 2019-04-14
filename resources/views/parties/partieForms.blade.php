@extends('template')

@section('contenu')
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>

    <form action="{{ route('storePartie') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}

        <div class=" row col-sm-5">
            <label for="jeu">@lang('contents.nom')</label>
            <input type="text" class="col-sm-11 form-control {{ $errors->has('jeu') ? 'is-invalid' : '' }}" name="jeu" id="jeu">
            {!! $errors->first('jeu', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class=" row col-sm-5">
            <label for="date">@lang('contents.datePartie')</label>
            <input type="date" class="col-sm-11 form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" name="date" id="date" value="{{date('Y-m-d')}}">
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-sm-5">
            <div class="radio">
                <label><input type="radio" name="option" id="opposition" checked>@lang('contents.opposition')</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="option" id="equipes">@lang('contents.equipes')</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="option" id="cooperation">@lang('contents.cooperation')</label>
            </div>
        </div>

        <div id="listeJoueurs">
        </div>
        <a id="addEquipeButton" onclick="addEquipe()"><i class="fa fa-plus-circle" style="font-size:36px;color:#007bff"></i></a>

        <input type="hidden" id="Equipe" name="Equipe">

        <div class="col-sm-5">
            <input class="btn btn-primary" type="submit" id="submit" value="Envoyer !">
        </div>

        <input type="hidden" id="jsonData" name="jsonData">
    </form>

    <script>
        var n= [1];
        var idEquipe=1;
        $("#addEquipeButton").show();
        addEquipe();
        addAutocomplete( '#jeu', '{{route('autocompleteNomJeu')}}');

        console.log(Date.now())
        $('#date').valueAsDate = new Date();

        function addJoueur(a) {
            if(n.length>=a){
                n.push(1);
            }
            var joueur = '<div class="row"><input type="text" id="inputJoueur_'+a+','+n[a]+'" class="form-control col-10 offset-1 mb-3" name="joueur,'+a+','+n[a]+'"><div/>';
            $("#content_"+a).append(joueur);
            $("input[name^='joueur']").each(function( index ) {
                addAutocomplete(this, '{{route('autocompleteJoueur')}}');
            });
            n[a]++;
        }

        function addEquipe(){
            var addJoueurBtn = '';
            var label;
            switch($("input[name='option']:checked").attr('id')){
                case 'opposition' :
                    label = '@lang('contents.joueur')' ;
                break;
                case 'equipes' :
                    label = '@lang('contents.equipe')' ;
                break;
                case 'cooperation' :
                    label = '@lang('contents.joueurs')' ;
                    addJoueurBtn = '<a onclick="addJoueur(' + idEquipe + ')"><i class="fa fa-plus-circle" style="font-size:36px;color:#007bff"></i></a>';
                break;
            }
            $("#listeJoueurs").append('<div class="card cardEquipe border-primary mb-3 ml-3 mr-3 mt-3" name="Equipe_'+idEquipe+'">' +
                '<div class="card-body" id="body">' +
                '<div class="row col-sm-12"><h5 class="card-title col-sm-12">' + label + ' ' + idEquipe + '<input type="text" class="form-control col-1 float-sm-right" name="Score_'+idEquipe+'"><span class="float-sm-right">@lang('contents.score')</span></h5></div>' +
                '<span id="content_' + idEquipe + '">' +
                '</span>' +
                addJoueurBtn +
                '</div>' +
                '</div>');
            addJoueur(idEquipe);
            idEquipe++;
        }

        function reset(){
            $(".cardEquipe").remove();
            n= [1];
            idEquipe=1;
        }

        $('#opposition').click(function(){
            $("#addEquipeButton").show();
            reset();
            addEquipe();
        });

        $('#cooperation').click(function(){
            $("#addEquipeButton").hide();
            reset();
            addEquipe();
        });

        $('#equipes').click(function(){
            $("#addEquipeButton").show();
            reset();
            addEquipe();
        });

        $('#submit').click(function() {
            var jsonData = {};
            jsonData['equipes'] = [];
            jsonData['jeu'] = $("input[name='jeu']").val();
            jsonData['date'] = $("input[name='date']").val();
            jsonData['categorie'] = $("input[name='option']:checked").attr('id');
            $("div[name^='Equipe_']").each(function (index) {
                alert('test');
                var equipe = {};
                equipe['joueurs'] = [];
                equipe['score'] = $("input[name='" + $(this).attr('name').replace('Equipe', 'Score') + "'").val();
                $(this).find("input[name^='joueur']").each(function (index) {
                    var joueur = {};
                    joueur['name'] = $(this).val();
                    equipe['joueurs'].push(joueur);
                });
                jsonData['equipes'].push(equipe);
            });
            console.log(JSON.stringify(jsonData));
            $('#jsonData').val(JSON.stringify(jsonData));
            $('#Equipe').val('test');
        })
    </script>
@endsection