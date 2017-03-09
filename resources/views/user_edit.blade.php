@extends('layouts.app')
@section('content')
    <div class="card white">
        {!! Form::open(['file' => true]) !!}
        <div class="card-content">
            {!! Form::model(Auth::user()) !!}
        
            {!! Form::label('pseudo', 'Username') !!}
            {!! Form::text('pseudo') !!}

            {!! Form::label('firstname', 'Firstname') !!}
            {!! Form::text('firstname') !!}

            {!! Form::label('lastname', 'Firstname') !!}
            {!! Form::text('lastname') !!}

            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email') !!}

            {!! Form::label('link', 'Lien site web') !!}
            {!! Form::text('link') !!}
    
            {!! Form::label('describe', 'Biographie') !!}
            {!! Form::text('describe') !!}
            {!! dump(Session::get('errors'))  !!}
    
            {!! Form::label('password', 'Nouveau mot de passe') !!}
            {!! Form::password('password') !!}
            
            {!! Form::label('picture', 'Nouvelle photo : ') !!}
            {!! Form::file('picture') !!}
        </div>
        <div class="card-action">
            <a href="#save"><i class="material-icons grey-text">save</i></a>
            {!! Form::submit('save', ['class' => 'material-icons grey-text']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
 