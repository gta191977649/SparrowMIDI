<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">MIDI Sparrow <span class="badge badge-light">v3</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">MIDI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SOUNDFONT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ANNOUNCEMENT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    STATUS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Data Total</a>
                    <a class="dropdown-item" href="#">About</a>
                    </div>
                </li>
                
                </ul>
                <!-- Login -->
                @guest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                </ul>
                @endguest
            
                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('ucp')}}">UCP</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </div>
                    </li>
                </ul>
                @endauth
            </div>
            </div>
        </nav>

        <div class="container mt-3">
            <div class="row">

                <div class="col-12 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Main
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{route('ucp.midi.add')}}">Upload new MIDI</a></li>
                            <li class="list-group-item">MIDI Management</li>
                            <li class="list-group-item">Notifications</li>
                        </ul>
                    
                    </div>
                </div>
                
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <hr/>
            <a class="float-right" href="#div">Back to top <i class="fa fa-caret-up"></i></a>
            <strong>{{ config('app.name', 'Laravel') }}</strong> is powered by <a href="{{route('about')}}">Project Sparrow 2018</a>
            <br/>
            <a href="https://github.com/PrpjectSparrow/SparrowMIDI"><i class="fa fa-github" aria-hidden="true"></i>
                Fork me on github!</a>
            , <a href="https://www.gnu.org/licenses/gpl-3.0.en.html">GPLv3</a>
        </div>
    </footer>        
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Addition js -->
    @yield('js')

</body>
</html>
