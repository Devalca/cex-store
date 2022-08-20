<header class="main_menu single_page_menu" style="padding-top: 10px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand text-white" href="">
                        Cex Store
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        
                    </div>
                    <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link btn_1 d-none d-sm-block text-white" style="padding: 10px; margin-right:10px" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link btn_1 d-none d-sm-block text-white" style="padding: 10px;" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <p style="margin-top: 10px; margin-right:12px;">Welcome Back </p>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn_1 d-none d-sm-block text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->roles == 'ADMIN')
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        @if (Auth::user()->roles == 'USER')
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                </nav>
            </div>
        </div>
    </div>
</header>