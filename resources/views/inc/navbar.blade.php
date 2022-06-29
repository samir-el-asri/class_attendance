<nav class="navbar navbar-light navbar-expand-md navigation-clean-button bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h2 style="text-tranform: uppercase;">
                {{ config('app.name', 'Laravel') }}
            </h2>
        </a>
        <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">

            @if (!Auth::guest())
                @switch(Auth::user()->fonction)
                    @case("admin")
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Etablissement
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/filieres">Filiéres</a>
                                    <a class="dropdown-item" href="/matieres">Matiéres</a>
                                    <a class="dropdown-item" href="/classes">Classes</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Membres
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/enseignants">Enseignats</a>
                                    <a class="dropdown-item" href="/etudiants">Etudiants</a>
                                </div>
                            </li>
                            <li role="presentation" class="nav-item"><a class="nav-link" href="/absences">Absences</a></li>
                            <i class="fa fa-search mr-2" id="search-field" name="search"></i>
                            <input type="search" class="form-control ml-auto w-25 rounded-8 h-25" placeholder="recherche..." />
                        </ul>
                    @break
                    @case("enseignant")
                        <ul class="nav navbar-nav mr-auto">
                            <li role="presentation" class="nav-item"><a class="nav-link active" href="/classes">Classes</a></li>
                            <li role="presentation" class="nav-item"><a class="nav-link" href="/matieres">Matiéres</a></li>
                        </ul>
                    @break
                    @case("etudiant")
                        <ul class="nav navbar-nav mr-auto">
                            <li role="presentation" class="nav-item"><a class="nav-link active" href="/matieres">Matieres</a></li>
                            <li role="presentation" class="nav-item"><a class="nav-link" href="/absences">Absences</a></li>
                        </ul>
                    @break
                @endswitch
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto bg-dark">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        </div>
    </div>
</nav>