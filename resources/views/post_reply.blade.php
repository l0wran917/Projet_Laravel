@extends('layouts.app')
@section('content')
    <div class="card white hoverable">
        <div class="card-content">
            <a href="{{ url('user', ['username' => $mainPost->user->pseudo]) }}"><span class="card-title">{{ ucfirst($mainPost->pseudo) }}</span></a>
            <em>Posté le {{ $mainPost->created_at->format('d/m/Y') }} à {{ $mainPost->created_at->format('H:i') }}</em>
            <p>{{ $mainPost->content }}</p>
        </div>
        <div class="card-action">
            @if(isset($likes[$mainPost->id]))
                <a
                        href="{{ route('unlike', ['id' => $mainPost->id]) }}"
                        onclick="
                                event.preventDefault();
                                document.getElementById('unlike-form-{{ $mainPost->id }}').submit();" >
                    <i class="material-icons red-text">favorite</i>
                </a>
                
                <form id="unlike-form-{{ $mainPost->id }}" action="{{ route('unlike', ['id' => $mainPost->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @else
                <a
                        href="{{ route('like', ['id' => $mainPost->id]) }}"
                        onclick="
                                event.preventDefault();
                                document.getElementById('like-form-{{ $mainPost->id }}').submit();" >
                    <i class="material-icons grey-text">favorite_border</i>
                </a>
                
                <form id="like-form-{{ $mainPost->id }}" action="{{ route('like', ['id' => $mainPost->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            <a href="#"><i class="material-icons grey-text">share</i></a>
        </div>
    </div>
    @foreach($responses as $post)
        <div class="card white hoverable">
            <div class="card-content">
                <a href="{{ url('user', ['username' => $post->user->pseudo]) }}"><span class="card-title">{{ ucfirst($user->pseudo) }}</span></a>
                <em>Posté le {{ $post->created_at->format('d/m/Y') }} à {{ $post->created_at->format('H:i') }}</em>
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-action">
                @if(isset($likes[$post->id]))
                    <a
                            href="{{ route('unlike', ['id' => $post->id]) }}"
                            onclick="
                                    event.preventDefault();
                                    document.getElementById('unlike-form-{{ $post->id }}').submit();" >
                        <i class="material-icons red-text">favorite</i>
                    </a>
        
                    <form id="unlike-form-{{ $post->id }}" action="{{ route('unlike', ['id' => $post->id]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a
                        href="{{ route('like', ['id' => $post->id]) }}"
                        onclick="
                            event.preventDefault();
                            document.getElementById('like-form-{{ $post->id }}').submit();" >
                        <i class="material-icons grey-text">favorite_border</i>
                    </a>
        
                    <form id="like-form-{{ $post->id }}" action="{{ route('like', ['id' => $post->id]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
                
                
                <a href="{{ route('post_reply', ['id' => $post->id]) }}"><i class="material-icons grey-text">comment</i></a>
                <a href="#"><i class="material-icons grey-text">share</i></a>
            </div>
        </div>
    @endforeach
    <div class="card white">
        <div class="card-content">
            <form action="{{ route('post_reply', ['id' => $mainPost->id]) }}" method="post">
                <div class="row">
                    <div class="input-field col l11">
                        <textarea name="content" id="textarea1" class="materialize-textarea" data-length="141"></textarea>
                        <label for="textarea1">Reponse</label>
                    </div>
                    <button class="btn col l1 waves-effect waves-light">
                        <i class="material-icons">send</i>
                    </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
 