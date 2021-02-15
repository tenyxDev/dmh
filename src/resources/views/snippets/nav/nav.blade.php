<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div>
        <div style="width: 150px;padding: 0 20px;">
            <a class="navbar-brand" href="{{ route('tickets.index') }}">
                {{ config('app.name', 'DMH v0.0.1') }}
            </a>
            <span style="color: #a0a0a0;font-size: 10px;white-space: nowrap;">Current time: {{ date('Y-m-d H:i:s') }}</span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="{{ route('tardis') }}">{{ __('TARDIS') }}</a>--}}
                {{--                </li>|
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
