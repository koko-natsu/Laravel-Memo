<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('common.header')
@yield('javascript')

<body>
    <div id="app">
       
        @include('common.nav-bar')

        <main class="">
            <div class="row">

                @include('common.tag-bar')
                
                @include('common.memo-bar')

                <div class="col-md-6 p-0">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
