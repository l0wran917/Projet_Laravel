
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset($user->picture) }}">
                    <span class="card-title">{{ ucfirst($user->pseudo) }}</span>
                    @if($user->id === Auth::id())
                        <a class="btn-floating halfway-fab waves-effect waves-light red"
                           href="{{ route('user_edit') }}" >
                            <i class="material-icons">delete_forever</i>
                        </a>
                    @elseif(isset($isFollowed) && $isFollowed === true)
                        <a class="btn-floating halfway-fab waves-effect waves-light red"
                           href="{{ route('unfollow', ['username' => Route::input('username')]) }}"
                           onclick="
                                        event.preventDefault();
                                        document.getElementById('unfollow-form').submit();" >
                            <i class="material-icons">delete_forever</i>
                        </a>
        
                        <form id="unfollow-form" action="{{ route('unfollow', ['username' => Route::input('username')]) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="btn-floating halfway-fab waves-effect waves-light teal"
                           href="{{ route('follow', ['username' => Route::input('username')]) }}"
                           onclick="
                                        event.preventDefault();
                                        document.getElementById('follow-form').submit();" >
                            <i class="material-icons">person_add</i>
                        </a>
        
                        <form id="follow-form" action="{{ route('follow', ['username' => Route::input('username')]) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
                <div class="card-content">
                    <p>{{ $user->describe }}</p>
                </div>
                <div class="card-action center">
                    <a href="#message" class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Envoyer un message"><i class="material-icons grey-text">message</i></a>
                    <a href="#" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cibler avec ma bubble"><i class="material-icons grey-text">bubble_chart</i></a>
                    <a href="{{ $user->link }}" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lien vers le site web" target="_blank"><i class="material-icons grey-text">link</i></a>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <p><a href="#wawats" class="modal-trigger">Wawats : {{ $user->posts->count() }}</a><br>
                        <a href="#wawaters" class="modal-trigger">Wawaters : {{ $user->follower->count() }}</a><br>
                        <a href="#wawated" class="modal-trigger">Wawated : {{ $user->followed->count() }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--  Modals  -->
    <div id="message" class="modal">
        <div class="modal-content">
            <div class="input-field col l12">
                <textarea id="textarea1" class="materialize-textarea" data-length="141"></textarea>
                <label for="textarea1">Envoyer un message</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons">send</i></a>
        </div>
    </div>

    <div id="wawaters" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Wawaters</h4>
            <div class="row">
                @if(isset($user->follower) && count($user->follower) > 0)
                    @foreach($user->follower as $wawater)
                        <div class="col l1">
                            <div class="card">
                                <div class="card-image">
                                    <a href="{{ route('user', ['username' => $wawater->follower->pseudo]) }}">
                                        <img src="{{ asset($wawater->follower->picture) }}">
                                        <span class="card-title">{{ ucfirst($wawater->follower->pseudo) }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div id="wawated" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Wawated</h4>
            <div class="row">
                @if(isset($user->followed) && count($user->followed) > 0)
                    @foreach($user->followed as $wawated)
                        <div class="col l1">
                            <div class="card">
                                <div class="card-image">
                                    <a href="{{ route('user', ['username' => $wawated->followed->pseudo]) }}">
                                        <img src="{{ asset($wawated->followed->picture) }}">
                                        <span class="card-title">{{ ucfirst($wawated->followed->pseudo) }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>











