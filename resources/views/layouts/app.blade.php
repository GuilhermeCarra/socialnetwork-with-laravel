<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            @include('includes.navbar')
        </nav>
        @if(auth()->user())
            @include('includes.search')
            @include('includes.friends')
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
