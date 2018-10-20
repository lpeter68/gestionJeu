<div class="form-group row">
    <label for="firstName" class="col-md-4 col-form-label text-md-right">@lang('contents.firstName')</label>

    <div class="col-md-6">
        <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ $joueur->nom }}" required autofocus>

        @if ($errors->has('firstName'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="lastName" class="col-md-4 col-form-label text-md-right">@lang('contents.lastName')</label>

    <div class="col-md-6">
        <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ $joueur->prenom }}" required>

        @if ($errors->has('lastName'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="surname" class="col-md-4 col-form-label text-md-right">@lang('contents.surname')</label>

    <div class="col-md-6">
        <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $joueur->surnom }}" required>

        @if ($errors->has('surname'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="applicationUser" class="col-md-4 col-form-label text-md-right">@lang('contents.applicationUser')</label>

    <div class="col-md-6">
        <input id="applicationUser" type="email" class="form-control{{ $errors->has('applicationUser') ? ' is-invalid' : '' }}" name="applicationUser" value="@if($joueur->applicationUser!=null){{$joueur->applicationUser->email}}@endif">

        @if ($errors->has('applicationUser'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('applicationUser') }}</strong>
            </span>
        @endif
    </div>
</div>

<input type="hidden" value="{{$joueur->id}}" name="id">

<script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>
<script>
    $( document ).ready(function() {
        //TODO Autocomplete HS (marche mais ne s'affiche pas)
        addAutocomplete('#applicationUser', '{{route('autocompleteUser')}}');
    });
</script>