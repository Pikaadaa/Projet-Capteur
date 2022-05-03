<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<div class="mb-0 w-auto d-flex-row container-fluid navbar navbar-expand navbar-light bg-dark">
    <div class="d-flex justify-content-center collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-white" height="50px" widh="50px" />
                </a>
            </div>
            <li class="ml-4 nav-item"><a class="text-white text-decoration-none nav-link h5" href="{{ route('dashboard') }}">Accueil</a></li>
            <li class="ml-4 nav-item"><a class="text-white text-decoration-none nav-link h5" href="{{ route('vehicles.index') }}">Véhicules</a></li>
            <li class="ml-4 nav-item"><a class="text-white text-decoration-none nav-link h5" href="{{ route('employees.index') }}">Employés</a></li>
            <li class="ml-4 nav-item"><a class="text-white text-decoration-none nav-link h5" href="{{ route('capturs.index') }}">Capteurs</a></li>
            <li class="ml-4 nav-item"><a class="text-white text-decoration-none nav-link h5" href="{{ route('maps.index') }}">Carte</a></li>
            <li class="mr-auto ml-4 d-flex nav-item dropdown ">
                <a class="text-white nav-link dropdown-toggle h5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Se déconnecter') }}
                        </x-dropdown-link>
                    </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

