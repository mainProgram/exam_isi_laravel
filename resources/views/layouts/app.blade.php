<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
        @yield('styles')
    </head>
    <body>
        <div class="container">
            <header class="row">
                @include('includes.header')
            </header>
            <div id="main">
                @yield('content')
            </div>
            <footer class="row">
                @include('includes.footer')
            </footer>
        </div>
        @yield('scripts')
        <script>
            $("#alert").fadeTo(2000, 1000).slideUp(1000, function(){$("#alert").slideUp(1000);});
        </script>
    </body>
</html>