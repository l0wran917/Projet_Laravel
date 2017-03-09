@extends('layouts.app')
@section('content')
    <div class="card white">
        {!! Form::open(['files' => true]) !!}
        <div class="card-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
 