<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('common.head')
</head>
<body>
    <div id="app">
        @include('common.nav-bar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
