<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bx-current-location'></i>
      <div class="logo_name">Tags</div>
    </div>
    <i class='bx bx-menu' id="btn" ></i>
  </div>
  <ul class="nav_list">
    <li>
      <a href="{{ route('dashboard') }}">
        <i class='bx bxs-dashboard' ></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>

    <li>
      <a href="{{ route('vehicles.index') }}">
        <i class='bx bxs-car'></i>
        <span class="links_name">Véhicules</span>
      </a>
      <span class="tooltip">Véhicules</span>
    </li>

    <li>
      <a href="{{ route('employees.index') }}">
        <i class='bx bx-male-female'></i>
        <span class="links_name">Salariés</span>
      </a>
      <span class="tooltip">Salariés</span>
    </li>

    <li>
      <a href="{{ route('capturs.index') }}">
        <i class='bx bx-current-location'></i>
        <span class="links_name">Capteurs</span>
      </a>
      <span class="tooltip">Capteurs</span>
    </li>

    <li>
      <a href="{{ route('maps.index') }}">
        <i class='bx bx-map-alt' ></i>
        <span class="links_name">Carte</span>
      </a>
      <span class="tooltip">Carte</span>
    </li>

  </ul>

  <div class="profile_content">
    <div class="profile">
      <div class="profile_details">
        <img src="{{ asset('storage/picture/765-default-avatar.png') }}" alt="">
        <div class="name_job">
          <div class="name">{{ Auth::user()->name }}</div>
        </div>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"><i class='bx bx-log-out' id="log_out"></i></button>
      </form>
    </div>
  </div>
</div>


