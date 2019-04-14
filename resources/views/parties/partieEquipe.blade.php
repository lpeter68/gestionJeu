<div id="listeJoueurs">
</div>
<a id="addEquipeButton" onclick="addEquipe()"><i class="fa fa-plus-circle" style="font-size:36px;color:     #007bff"></i></a>

<input type="hidden" id="Equipe" name="Equipe">

<script>
    var n= [1];
    var idEquipe=1;
    addEquipe();
    addAutocomplete( '#jeu', '{{route('autocompleteNomJeu')}}');

    console.log(Date.now())
    $('#date').valueAsDate = new Date();

    function addJoueur(a) {
        if(n.length>=a){
            n.push(1);
        }
        $("#content_"+a).append('<input type="text" id="inputJoueur_'+n[a]+'" class="form-control col-10 mb-3" name="joueur">');
        addAutocomplete("#inputJoueur_"+n[a], '{{route('autocompleteJoueur')}}');
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

    $('#submit').click(function(){
        $('#Equipe').val('test')
    })
</script>