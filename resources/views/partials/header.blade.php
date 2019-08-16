<meta name="csrf-token" content="{{ csrf_token() }}">
<nav class='navbar navbar-expand-sm navbar-light bg-light nav-border'>
    <div class='container'>

        <a class='navbar-brand' href="{{ url('/') }}">VGTU DEMO</a>

        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive'
                aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarResponsive'>
            <ul class='navbar-nav mr-auto'>

                @hasrole('user')
                <li class='nav-item'>
                    @if(Route::currentRouteName() == 'events.index')
                        <a class='text-body mr-2' href="{{route('events.index')}}">{{trans('header.events')}}</a>
                    @else
                        <a class='text-secondary mr-2' href="{{route('events.index')}}">{{trans('header.events')}}</a>
                    @endif
                </li>
                <li class='nav-item'>
                    @if(Route::currentRouteName() == 'restaurants.index')
                        <a class='text-body mr-2'
                           href="{{route('restaurants.index')}}">{{trans('header.restaurants')}}</a>
                    @else
                        <a class='text-secondary mr-2'
                           href="{{route('restaurants.index')}}">{{trans('header.restaurants')}}</a>
                    @endif
                </li>
                <li class='nav-item'>
                    @hasrole('admin')
                    @if(Route::currentRouteName() == 'users.index')
                        <a class='text-body' href="{{route('users.index')}}">{{trans('header.manage_users')}}</a>
                    @else
                        <a class='text-secondary' href="{{route('users.index')}}">{{trans('header.manage_users')}}</a>
                    @endif
                    @endhasrole
                </li>
                @endhasrole

            </ul>

            <ul class='navbar-nav ml-auto'>
                @guest
                    <li class='nav-item'>
                        @if(Route::currentRouteName() == 'login')
                            <a class='nav-link text-body' href="{{ route('login') }}">{{ trans('header.login') }}</a>
                        @else
                            <a class='nav-link text-secondary'
                               href="{{ route('login') }}">{{ trans('header.login') }}</a>
                        @endif
                    </li>
                    @if (Route::has('register'))
                        <li class='nav-item'>
                            @if(Route::currentRouteName() == 'register')
                                <a class='nav-link text-body'
                                   href="{{ route('register') }}">{{ trans('header.register') }}</a>
                            @else
                                <a class='nav-link text-secondary'
                                   href="{{ route('register') }}">{{ trans('header.register') }}</a>
                            @endif
                        </li>
                    @endif
                @else
                    <li class='nav-item dropdown'>
                        <a id='navbarDropdown' class='nav-link dropdown-toggle text-body' href='#' role='button'
                           data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' v-pre>
                            {{ Auth::user()->name }} <span class='caret'></span>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href="{{ route('logout') }}"
                               onclick='event.preventDefault();
                                                     document.getElementById("logout-form").submit();'>
                                {{ trans('header.logout') }}
                            </a>

                            <form id='logout-form' action="{{ route('logout') }}" method='POST'
                                  style='display: none;'>
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
