<!-- Navigation -->
<h6 class="navbar-heading text-muted">
  @if (auth()->user()->role == 'admin')
    Gestion de Datos
  @else
    Menu
  @endif</h6>
<ul class="navbar-nav">
@if (auth()->user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-tv-2 text-primary"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-planet text-blue"></i> Especialidades
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/doctors') }}">
      <i class="ni ni-pin-3 text-orange"></i> Medicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/patients">
      <i class="ni ni-single-02 text-yellow"></i> Pacientes
    </a>
  </li>
@elseif(auth()->user()->role == 'doctor')
  <li class="nav-item">
    <a class="nav-link" href="/schedule">
      <i class="ni ni-tv-2 text-primary"></i> Gestionar Horario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-time-alarm text-default"></i> Mis Citas
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-planet text-warning"></i> Mis Pacientes
    </a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-laptop text-info"></i> Reservar Cita
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-planet text-blue"></i> Especialidades
    </a>
  </li>
@endif

<li class="nav-item">

    <a class="nav-link" onclick="event.preventDefault(); document.getElementById('formLogOut').submit();">
      <i class="ni ni-key-25 text-info"></i>
      Cerrar Sesion
    </a>
    <form action="{{ route('logout') }}" id="formLogOut"
     method="POST" style="display: none;">
      @csrf
    </form>
<!--
    <form action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="nav-link" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
-->

</li>

</ul>
@if (auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="ni ni-spaceship"></i> Frecuencia de Citas
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="ni ni-palette"></i> Medicos mas Activos
  </a>
</li>
</ul>
@endif
