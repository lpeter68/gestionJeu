<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <select class="form-control" id="exampleFormControlSelect1" name="role">
            @foreach($roles as $role)
                @if($user->hasRole($role->name))
                    <option selected="selected" value="{{$role->id}}">{{$role->name}}</option>
                @else
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<input type="hidden" value="{{$user->id}}" name="id">