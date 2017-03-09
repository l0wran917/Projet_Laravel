@extends('layouts.app')

@section('content')
    <div class="card white">
        <div class="card-content">
            <h4 class="card-title">Enregistrement</h4>
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                    <label for="pseudo">Pseudo</label>
                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required autofocus>
                    @if ($errors->has('pseudo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pseudo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <div class="col l6 s12">
                        <label for="lastname">Nom</label>
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col l6 s12">
                        <label for="firstname">Prénom</label>
                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="row">
                    <button class="right btn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
