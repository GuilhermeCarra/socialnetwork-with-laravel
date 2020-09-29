<div class="container flex justify-content-center justify-content-sm-between align-items-center">
    <a class="navbar-brand p-0 m-0" href="{{ url('/') }}">
        {{ config('app.name') }}
    </a>

        <!-- Right Side Of Navbar -->
    <ul class="navbar-icons p-0 mb-0 ml-auto">
            <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link {{Request::is('login') ? 'active' : ''}}" href="{{ route('login') }}"><i class="ri-login-box-line"></i>{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link {{Request::is('register') ? 'active' : ''}}" href="{{ route('register') }}"><i class="ri-user-add-line"></i>{{ __('Register') }}</a>
        </li>
        @endif
        @else
            
        <li class="navbar-item" id="search-button">
            <span class="navbar-link bg-blue-primary">
                <i class="ri-search-line text-white"></i>
            </span>
        </li>

        <li class="navbar-item">
            <a class="navbar-link" href="{{ route('home') }}"><i class="ri-home-5-{{Request::is('/') || Request::is('home') ? 'fill' : 'line'}}"></i></a>
        </li>

        <li class="navbar-item"><a class="navbar-link" href="{{url(auth()->user()->username)}}"><i class="ri-user-3-line"></i></a></li>

        @endguest
    </ul>
</div>