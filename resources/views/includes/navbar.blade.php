<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
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
            <li class="nav-item">
                @include('includes.search_button')
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="ri-user-3-{{Request::is(auth()->user()->username) ? 'fill' : 'line'}}"></i>{{ Auth::user()->username }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{-- HOME --}}
                    <a class="dropdown-item" href="{{ route('home') }}"><i class="ri-home-5-{{Request::is('/') || Request::is('home') ? 'fill' : 'line'}}"></i>Home</a>

                    {{-- PROFILE --}}
                    <a class="dropdown-item" href="{{ url(auth()->user()->username) }}"><i class="ri-user-3-{{ Request::is(auth()->user()->username) ? 'fill' : 'line'}}"></i>Profile</a>

                    {{-- Edit PROFILE --}}
                    <a class="dropdown-item" href="{{ url(auth()->user()->username.'/config') }}"><i class="ri-settings-4-{{Request::is('config') ? 'fill' : 'line'}}"></i>Edit Profile</a>

                    {{-- LOGOUT --}}
                    <hr>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-r-line"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>