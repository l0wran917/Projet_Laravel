@extends('layouts.app')

@section('content')
    <div class="card-title">
        Connexion
    </div>
    <div class="card-content">
        <div class="row">
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="validate">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" class="validate">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col l6">
                        <a class="waves-effect waves-light btn btn-cancel" href="{{ route('password.request') }}">Oubli de mot de passe</a>
                    </div>
                    <div class="col l6">
                        <button class="waves-effect waves-light btn right" type="submit"><i class="material-icons left">lock</i>Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
