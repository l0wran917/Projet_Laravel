@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <div class="card white hoverable">
            <div class="card-content">
                <a href="user/pseudo"><span class="card-title">{{ ucfirst($user->pseudo) }}</span></a>
                <em>Posté le {{ $post->created_at->format('d/m/Y') }} à {{ $post->created_at->format('H:i') }}</em>
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-action">
                <a href="#"><i class="material-icons grey-text">favorite_border</i></a>
                <a href="#"><i class="material-icons grey-text">comment</i></a>
                <a href="#"><i class="material-icons grey-text">share</i></a>
            </div>
        </div>
    @endforeach
@endsection
 