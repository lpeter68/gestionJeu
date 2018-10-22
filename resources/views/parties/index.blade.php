@extends('template')

@section('contenu')
    <h1>@lang('contents.parties')</h1>
    <br>
    <table id="parties" class="display" style="width:100%">
        <thead>
        <tr>
            <th>@lang('contents.jeu')</th>
            <th>@lang('contents.datePartie')</th>
            <th>@lang('contents.duree')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($parties as $partie)
            <tr>
                <td>{{$partie->jeu}}</td>
                <td>{{$partie->date}}</td>
                <td>{{$partie->duree}}</td>
                <td>
                    <input type="button" class="btn btn-primary" onclick="update('{{route("createPartie",$jeu->id)}}')" value="@lang('contents.update')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href='{{route("createPartie")}}'><i class="fa fa-plus-circle" style="font-size:36px;color:     #007bff"></i></a>

    <script>
        $(document).ready(function() {
            $('#parties').DataTable();
        } );

        function update(route) {
            location.href = route;
        }
    </script>
@endsection