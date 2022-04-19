<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<div class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="text-white text-decoration-none nav-link" href="#">Accueil</a></li>
            <li class="nav-item"><a class="text-white text-decoration-none nav-link" href="{{ route('vehicles.index') }}">Véhicules</a></li>
            <li class="nav-item"><a class="text-white text-decoration-none nav-link" href="#">Carte</a></li>
            <li class="nav-item"><a class="text-white text-decoration-none nav-link" href="#">Historique</a></li>
            <li class="nav-item"><form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link class="text-white" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form></li>
        </ul>
    </div>
</div>