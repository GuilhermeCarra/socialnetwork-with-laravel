<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @include('includes.navbar')
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
