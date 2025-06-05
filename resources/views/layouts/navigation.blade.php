<nav class="navbar navbar-expand-lg navbar-light bg-body border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('tarefas.home') }}">
            <img src="{{ asset('Assets/Imgs/logo.png') }}" alt="" height="50" width="50">
        </a>

        <!-- Botão de toggle (hamburger) para mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Conteúdo do menu -->
        <div class="collapse navbar-collapse bg-body" id="navbarContent">
            <!-- Links de navegação -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('tarefas.home') }}">
                        {{ __('To-do list') }}
                    </a>
                </li>
            </ul>

            <!-- Dropdown de configurações -->
            <ul class="navbar-nav ms-auto">
                @auth
                 
    <a onclick="toggleTheme()" class="btn btn-link nav-link">
        <i class="fa-solid fa-moon fa-lg"></i>
    </a>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-body" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </li>
@endauth

@guest
    <li class="nav-item">
        <a class="btn btn-link nav-link" href="{{ route('login') }}">Entrar</a>
    </li>
    <a onclick="toggleTheme()" class="btn btn-link nav-link">
        <i class="fa-solid fa-circle-half-stroke fa-lg"></i>
    </a>
    
@endguest

            </ul>
        </div>
    </div>
</nav>
