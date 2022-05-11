<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<nav class="mb-0 h5 navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <div class="shrink-0 flex items-center">
            <a class="ml-4" href="{{ route('dashboard') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-white" height="50px" widh="50px" />
            </a>
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="4 nav-item">
            <a class="nav-link active ml-4" aria-current="page" href="{{ route('dashboard') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ml-4" href="{{ route('vehicles.index') }}">Véhicules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ml-4" href="{{ route('employees.index') }}">Employés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ml-4" href="{{ route('capturs.index') }}">Capteurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ml-4" href="{{ route('maps.index') }}">Carte</a>
          </li>
          <li class="mr-auto d-inline-block nav-item dropdown ">
                <a class="text-white nav-link dropdown-toggle ml-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
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
</nav>

