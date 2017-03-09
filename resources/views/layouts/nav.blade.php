<nav class="teal" role="navigation">
    <div class="nav-wrapper"><a id="logo-container" href="{{ url('home') }}" class="brand-logo">WAWAT</a>
        <ul class="right hide-on-med-and-down">
            @if(!Auth::id())
                <li><a href="{{url('login')}}"><i class="material-icons">lock_open</i></a></li>
            @else
                <a href="{{ route('logout') }}"
                   onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();"> <i class="material-icons">lock</i>
                </a>
        
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <li><a href="{{url('user/pseudo')}}"><i class="material-icons">settings</i></a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>