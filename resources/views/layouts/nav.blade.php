<nav class="teal" role="navigation">
    <div class="nav-wrapper"><a id="logo-container" href="{{ url('home') }}" class="brand-logo">WAWAT</a>
        <ul class="right hide-on-med-and-down">
            @if(!Auth::id())
                <li><a href="{{url('login')}}"><i class="material-icons">lock_open</i></a></li>
            @else
                <li><a href="{{url('logout')}}"><i class="material-icons">lock</i></a></li>
                <li><a href="{{url('user/pseudo')}}"><i class="material-icons">settings</i></a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>