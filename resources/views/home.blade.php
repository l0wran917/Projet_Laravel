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
                <a href="user/pseudo"><span class="card-title">{{ ucfirst($post->user->pseudo) }}</span></a>
                <em>Posté le  à </em>
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-action">
                <a href="">
                    <i class="material-icons grey-text">favorite_border</i>
                </a>
                <form id="like-form-2" action="route" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            
                <a href="#"><i class="material-icons grey-text">comment</i></a>
                <a href="#"><i class="material-icons grey-text">share</i></a>
            </div>
        </div>
    @endforeach
@endsection
