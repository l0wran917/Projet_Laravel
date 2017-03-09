@extends('layouts.app')

@section('content')
    <div class="card white">
        <div class="card-content">
            <form action="{{ route('new_post') }}" method="post">
                <div class="row">
                    <div class="input-field col l11">
                        <textarea name="content" id="textarea1" class="materialize-textarea" data-length="141"></textarea>
                        <label for="textarea1">Hello <i class="material-icons tiny">face</i></label>
                    </div>
                    <button class="btn col l1 waves-effect waves-light">
                        <i class="material-icons">send</i>
                    </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="card white hoverable">
            <div class="card-content">
                <a href="{{ url('user', ['username' => $post->user->pseudo]) }}"><span class="card-title">{{ ucfirst($post->user->pseudo) }}</span></a>
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
                <form id="like-form-2" action="route" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            
                <a href="{{ route('post_reply', ['id' => $post->id]) }}"><i class="material-icons grey-text">comment</i></a>
                <a href="#"><i class="material-icons grey-text">share</i></a>
            </div>
        </div>
    @endforeach
@endsection
