<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <nav class="nav-border">
        <div class="nav-wrapper">
            <div class="container">
                
                <div class="row">
                    <div class="col s2">
                        <a href="#" class="brand-logo">Logo</a>
                        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                    </div>
                    
                    <div class="col s8 hide-on-med-and-down">
                        <form>
                            <div class="input-field">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i>
                                </label>
                                <i class="material-icons closed">close</i>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col s2 hide-on-med-and-down">
                        <a class='dropdown-button' href='#' data-activates='dropdown-menu'>Drop Me!</a>
                        <ul id='dropdown-menu' class='dropdown-content'>
                            <li><a href="#!">one</a></li>
                            <li><a href="#!">two</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">three</a></li>
                        </ul>
                    </div>
                </div>
                
                <ul class="side-nav" id="mobile-menu">
                    <li><a href="#"><i class="material-icons">perm_identity</i></a>
                    </li>
                </ul>
                <ul id="slide-out" class="side-nav">
                    <li><div class="userView">
                            <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
                            <a href="#!name"><span class="white-text name">John Doe</span></a>
                            <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                        </div></li>
                    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                    <li><a href="#!">Second Link</a></li>
                    <li><div class="divider"></div></li>
                    <li><a class="subheader">Subheader</a></li>
                    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            
            </div>
        </div>
    </nav>
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>
