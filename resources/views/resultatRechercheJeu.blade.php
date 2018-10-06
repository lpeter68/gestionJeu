@extends('template')

@section('contenu')
    <div id="result"></div>
    <script type="text/javascript">
        @foreach ($jeux as $jeu)
            remplirImage("{{route("getJeuImage",$jeu->id)}}");
        @endforeach

        function remplirImage(route) {

            var i = 0;
            var div = $('<div class="col-md-4 image_jeu"></div>');
            var image = $('<img id="image_'+ i++ +'" class="img-fluid"/>');
            div.html(image);
            $('#result').append(div);

            console.log('test')
            var jqxhr = $.ajax({
                type: 'get',
                url: route,
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: ""

            })
                .done(function (response, textStatus, jqXHR) {
                    image.attr('src',response);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    image.html("<option value=''>Impossible de joindre le serveur</option>");
                });
        }
    </script>
    <style>
        .image_jeu{
            display: inline-block;
        }
    </style>
@endsection