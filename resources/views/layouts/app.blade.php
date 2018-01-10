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
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        @include("layouts.nav")

        <div class="container mt-3">
        @yield('content')
        <hr/>
        </div>
    </div>

    
    <footer>
    <div class="container">
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
</body>
</html>
