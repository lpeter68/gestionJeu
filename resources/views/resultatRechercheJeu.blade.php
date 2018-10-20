@extends('template')

@section('contenu')
    <div id="result" class="top-margin row">
        @foreach ($jeux as $jeu)
            <div class="col-lg-2 col-md-4 col-sm-6 image_jeu" data-toggle="tooltip" data-placement="top" title="{{$jeu->temps_jeu}}min">
                <img id="image_{{$jeu->id}}" class="img-fluid"/>
                <div class="col-xs-12 text-center">
                    <span>
                        {{$jeu->nom}}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            @foreach ($jeux as $jeu)
            remplirImage("{{route("getJeuImage",$jeu->id)}}",{{$jeu->id}});
            @endforeach
        });

        function remplirImage(route, id) {

            var i = 0;

            var image = '#image_'+id;
            $.ajax({
                type: 'get',
                url: route,
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: ""

            })
                .done(function (response, textStatus, jqXHR) {
                    $(image).attr('src',response);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    $(image).html("<option value=''>Impossible de joindre le serveur</option>");
                });
        }
    </script>
    <style>
        .image_jeu{
            display: inline-block;
        }
        .image_jeu img{
            border-radius: 5px;
        }
    </style>
@endsection