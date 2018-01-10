<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">MIDI Sparrow <span class="badge badge-light">v3</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">首页</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('midi')}}">MIDI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">音色库</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">公告</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                系统
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('status')}}">数据统计</a>
                <a class="dropdown-item" href="{{route('about')}}">关于</a>
                </div>
            </li>
            
            </ul>
            <!-- Login -->
            @guest
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">登录</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">注册</a>
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
                    <a class="dropdown-item" href="{{route('ucp')}}">管理面板</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        登出
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