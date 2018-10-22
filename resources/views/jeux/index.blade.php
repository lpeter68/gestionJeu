@extends('template')

@section('contenu')
    <h1>@lang('contents.jeux')</h1>
    <br>
    <table id="jeux" class="display" style="width:100%">
        <thead>
        <tr>
            <th>@lang('contents.nom')</th>
            <th>@lang('contents.edition')</th>
            <th>@lang('contents.nombre_joueur_min')</th>
            <th>@lang('contents.nombre_joueur_max')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jeux as $jeu)
            <tr>
                <td>{{$jeu->nom}}</td>
                <td>{{$jeu->edition}}</td>
                <td>{{$jeu->nombre_joueur_min}}</td>
                <td>{{$jeu->nombre_joueur_max}}</td>
                <td>
                    <input type="button" class="btn btn-primary" onclick="update('{{route("createJeu",$jeu->id)}}')" value="@lang('contents.update')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href='{{route("createJeu",0)}}'><i class="fa fa-plus-circle" style="font-size:36px;color:     #007bff"></i></a>

    <script>
        $(document).ready(function() {
            $('#jeux').DataTable();
        } );

        function update(route) {
            location.href = route;
        }
    </script>
@endsection