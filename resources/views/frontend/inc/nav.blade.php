<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" style="font-size: 20pt" href="{{ route('index') }}">MovieTalk</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            {{-- === AUTHORIZATION CHECK FOR ROLES (GUEST, ADMIN, USER) === --}}
    {{-- === Navbar Content will be Visible to the User by their Role Permission  === --}}

            {{-- === GUEST SECTION START === --}}
            @if(Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>

            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle categoryHover" onclick="location.href='{{ route('CategoryList') }}'"  id="navbardrop" data-toggle="dropdown">
                    Categories
                </a>

                <div class="dropdown-menu sm-menu text-center">
                    @foreach(\App\categories::orderBy('title', 'asc')->get() as $cat)
                        <a class="dropdown-item" href="{{ route('PostByCategory',['id' => $cat->id, 'slug' => $cat->slug]) }}"> {{ $cat->title }} </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>

            {{-- === LOGIN AND REGISTRATION SECTION START === --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            {{-- === LOGIN AND REGISTRATION SECTION END === --}}
            {{-- === GUEST SECTION END === --}}

            {{-- === USER SECTION START === --}}
            @elseif(Auth::User()->hasRole('user'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>

                <li class="nav-item dropdown dmenu">
                    <a class="nav-link dropdown-toggle categoryHover" onclick="location.href='{{ route('CategoryList') }}'"  id="navbardrop" data-toggle="dropdown">
                        Categories
                    </a>

                    <div class="dropdown-menu sm-menu text-center">
                        @foreach(\App\categories::orderBy('title', 'asc')->get() as $cat)
                            <a class="dropdown-item" href="{{ route('PostByCategory',['id' => $cat->id, 'slug' => $cat->slug]) }}"> {{ $cat->title }} </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('createPost') }}">Post Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('myBlog') }}">My Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

                <li class="nav-item dropdown dmenu">
                    <a class="nav-link categoryHover" href="#" id="navbardrop" data-toggle="dropdown">
                        Welcome |
                        {{ SubStr(Auth::user()->name, -5) }} <span class="fas fa-sign-out-alt"></span>
                    </a>

                    <div class="dropdown-menu text-left sm-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('viewUserProfile', \Illuminate\Support\Facades\Auth::user()) }}">
                            Profile
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        {{--<li class="nav-item">
                                <a class="nav-link" href="#">Login <span class="fas fa-sign-in-alt"></span></a>
                            </li>--}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                {{-- === USER SECTION END === --}}

                {{-- ADMIN SECTION START --}}
                @elseif(\Illuminate\Support\Facades\Auth::User()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle categoryHover" onclick="location.href='{{ route('CategoryList') }}'"  id="navbardrop" data-toggle="dropdown">
                            Categories
                        </a>

                        <div class="dropdown-menu sm-menu text-center">
                            @foreach(\App\categories::orderBy('title', 'asc')->get() as $cat)
                                <a class="dropdown-item" href="{{ route('PostByCategory',['id' => $cat->id, 'slug' => $cat->slug]) }}"> {{ $cat->title }} </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link categoryHover" href="#" id="navbardrop" data-toggle="dropdown">
                            Welcome |
                            {{ SubStr(Auth::user()->name, -5) }} <span class="fas fa-sign-out-alt"></span>
                        </a>

                        {{-- NOTE --}}
                        {{-- ==== HELPER FUNCTION ====
                            ==>> {{ substr(Auth::user()->name, -5) }}
                            ['SubStr()' will disply last characters for a string]

                            ==>> {{ Str::limit(Auth::user()->name, 8) }}
                            ['Str::limit()' will disply first characters for a string]
                        --}}

                        <div class="dropdown-menu text-left sm-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('adminEditProfile', \Illuminate\Support\Facades\Auth::user()) }}">
                                Profile
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- ADMIN SECTION END --}}

                @endif
                {{-- === Check if GUEST, ADMIN or USER End === --}}
            </ul>
        </div>
    </div>
</nav>
