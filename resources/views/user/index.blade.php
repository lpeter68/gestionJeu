@extends('template')

@section('contenu')
    <h1>@lang('contents.user')</h1>
    <br>
    <table id="user" class="display" style="width:100%">
        <thead>
        <tr>
            <th>@lang('contents.user')</th>
            <th>@lang('contents.email')</th>
            <th>@lang('contents.role')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                </td>
                <td>
                    @if($user->id!=Auth::User()->id)
                        <input type="button" class="btn btn-primary modifyUser" onclick="update('{{route("modalUser",$user->id)}}')" value="@lang('contents.update')">
                    @endif
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
            showFormModal(route, "{{route("updateUser")}}", "@lang('contents.editUser')");
        }
    </script>
@endsection