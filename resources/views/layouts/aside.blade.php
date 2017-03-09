
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                    <img src="http://materializecss.com/images/yuna.jpg">
                    <span class="card-title">Pseudo</span>
                    @if(isset($isFollowed) && $isFollowed === true)
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
                    <p>Hey My Name is WALA je fais des photos.</p>
                </div>
                <div class="card-action center">
                    <a href="#message" class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Envoyer un message"><i class="material-icons grey-text">message</i></a>
                    <a href="#" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cibler avec ma bubble"><i class="material-icons grey-text">bubble_chart</i></a>
                    <a href="#" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lien vers le site web" target="_blank"><i class="material-icons grey-text">link</i></a>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <p><a href="#wawats" class="modal-trigger">Wawats : 13</a><br>
                        <a href="#wawaters" class="modal-trigger">Wawaters : 20</a><br>
                        <a href="#wawated" class="modal-trigger">Wawated : 80</a>
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
                <div class="col l1">
                    <div class="card">
                        <div class="card-image">
                            <a href="user/pseudo">
                                <img src="http://materializecss.com/images/yuna.jpg">
                                <span class="card-title">Pseudo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="wawated" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Wawated</h4>
            <div class="row">
                <div class="col l1">
                    <div class="card">
                        <div class="card-image">
                            <a href="user/pseudo">
                                <img src="http://materializecss.com/images/yuna.jpg">
                                <span class="card-title">Pseudo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











