<nav class="teal" role="navigation">
    <div class="nav-wrapper"><a id="logo-container" href="{{ url('home') }}" class="brand-logo">WAWAT</a>
        <ul class="right hide-on-med-and-down">
            @if(!Auth::id())
                <li><a href="{{url('login')}}"><i class="material-icons">lock_open</i></a></li>
                <li><a href="{{url('register')}}"><i class="material-icons">input</i></a></li>
            @else
                <li><a href="#search"><i class="material-icons">search</i></a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();"> <i class="material-icons">lock</i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="{{route('user_edit')}}"><i class="material-icons">settings</i></a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div id="search" class="modal">
    <div class="modal-content">
        <h4>Rechercher</h4>
        <div class="row">
            <form class="col s10 offset-s1" action="{{ route('search') }}" method="get">
                <div class="input-field">
                    <input name="query" id="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </div>
</div>