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
    <a class="nav-link" href="/home">
      <i class="ni ni-tv-2 text-primary"></i> Gestionar Horario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-time-alarm text-blue"></i> Mis Citas
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-planet text-blue"></i> Mis Pacientes
    </a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-laptop text-primary"></i> Reservar Cita
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/specialties') }}">
      <i class="ni ni-planet text-blue"></i> Especialidades
    </a>
  </li>

@endif
<li class="nav-item">

  <a class="nav-link" href="./examples/tables.html">
    <i class="ni ni-bullet-list-67 text-red"></i> Tables
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
  document.getElementById('formLogout').submit();">
    <i class="ni ni-key-25 text-info"></i>Cerrar Sesion
  </a>
  <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
    @csrf
  </form>
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
