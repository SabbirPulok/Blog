<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills mr-auto">
            <li class="nav-item">
                <a class="{{Request::is('/')?"nav-link active" : "nav-link"}}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('blog')?"nav-link active" : "nav-link"}}" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('contact')?"nav-link active" : "nav-link"}}" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="{{Request::is('about')?"nav-link active" : "nav-link"}}" href="/about">About</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @guest
                <a href="{{route('login')}}" class="btn btn-outline-primary my-2 my-sm-0 btn-space">Login</a><hr>
                <a href="{{route('register')}}" class="btn btn-outline-success my-2 my-sm-0 ">Register</a>
            @else
            <li class="nav-item dropdown">
                @if(Auth::guard('web')->check())
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-outline-danger my-2 my-sm-0">Hello! {{Auth::user()->name}}</button>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                    <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @else
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button class="btn btn-outline-danger my-2 my-sm-0">Hello! {{Auth::user()->name}}</button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
            </li>
                @endif
            @endguest

        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
        {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
    </div>
</nav>