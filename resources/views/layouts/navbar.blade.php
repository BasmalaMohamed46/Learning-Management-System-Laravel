<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
    <img src="{{ asset('graduates.png') }}" alt="Logo" class="mr-3">
        <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 1.7em;">
            {{ config('app.name', 'Learn') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto" id="centered-tabs">
                <li class="nav-item mx-3">
                    <a class="nav-link {{ request()->routeIs('courses.index') ? 'text-white font-weight-bold' : 'text-white' }}" href="{{ route('courses.index') }}">Courses</a>
                </li>
                @auth
                    @if(Auth::user()->role != 'admin')
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->routeIs('user-courses') ? 'text-white font-weight-bold' : 'text-white' }}" href="{{ route('user-courses') }}">My Courses</a>
                        </li>
                    @else
                        <li class="nav-item mx-3">
                            <a class="nav-link {{ request()->routeIs('courses.create') ? 'text-white font-weight-bold' : 'text-white' }}" href="{{ route('courses.create') }}">Add Course</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <form class="form-inline" action="{{ route('courses.search') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search">
                            <button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
