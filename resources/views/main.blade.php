<!doctype html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>

    <body>
        @include('partials._navs')

        <div class="container">
            @include('partials._messages')
            @yield('content')
            @include('partials._footer')
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @include('partials._javascripts')
        @yield('scripts')
    </body>
</html>