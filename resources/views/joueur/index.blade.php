@extends('template')

@section('contenu')
    <h1>@lang('contents.joueurs')</h1>
    <br>
    <table id="user" class="display" style="width:100%">
        <thead>
        <tr>
            <th>@lang('contents.firstName')</th>
            <th>@lang('contents.lastName')</th>
            <th>@lang('contents.surname')</th>
            <th>@lang('contents.user')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($joueurs as $joueur)
            <tr>
                <td>{{$joueur->nom}}</td>
                <td>{{$joueur->prenom}}</td>
                <td>{{$joueur->surnom}}</td>
                <td>
                    @if($joueur->applicationUser != null )
                        {{$joueur->applicationUser->email}}</td>
                    @endif
                <td>
                    <input type="button" class="btn btn-primary modifyUser" onclick="update('{{route("modalJoueur",$joueur->id)}}')" value="@lang('contents.update')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#user').DataTable();
        } );

        function update(route) {
            showFormModal(route, "{{route("updateJoueur")}}", "@lang('contents.editJoueur')");
        }
    </script>
@endsection