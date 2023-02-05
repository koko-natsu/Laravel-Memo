<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.header')
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
