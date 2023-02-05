<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.head')
    @yield('javascript')
</head>

<body>
    <div id="app">
       
        @include('common.nav-bar')

        <main class="container">
            <div class="row">

                <div class="col-md-2 p-1">
                    @include('common.tag-bar')
                </div>
                
                <div class="col-md-4 p-1">
                    @include('common.memo-bar')
                </div>

                <div class="col-md-6 p-1">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
