<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container" style="padding: 0 10px">
        <a class="navbar-brand" href="{{ route('ticket.docs') }}">
            {{ config('app.name', 'DMH v0.0.1') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}"
                style="padding: 0;">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('tardis') }}">{{ __('TARDIS') }}</a>--}}
{{--                </li>|--}}
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tickets.index') }}">{{ __('TICKET LIST') }}</a>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tickets.create') }}">{{ __('CREATE TICKET') }}</a>
                </li>
                @endif
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="{{ route('ticket.docs') }}">{{ __('TICKET DOCS') }}</a>--}}
                {{--                </li>--}}
                {{--                |--}}
            </ul>

            <div class="clearfix hr"></div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                    </li>|
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>
