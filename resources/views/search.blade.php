@extends('layouts.app')

@section('content')
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h1>Recherche pour : {{ $query }}</h1>
                    <p class="black-text">
                        @if(count($results) <= 0)
                            Aucun résultat...
                        @else
                            @if(isset($results['users']))
                                <h2>Users</h2>
                                @foreach($results['users'] as $user)
                                    {{ $user->pseudo }}
                                @endforeach
                            @endif

                            @if(isset($results['posts']))
                                <h2>Posts</h2>
                                @foreach($results['posts'] as $post)
                                    {{ $post->content }}
                                @endforeach
                            @endif
                        @endforelse
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
