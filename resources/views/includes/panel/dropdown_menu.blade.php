<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
  <div class=" dropdown-header noti-title">
    <h6 class="text-overflow m-0">Bienvenido!</h6>
  </div>
  <a href="#" class="dropdown-item">
    <i class="ni ni-single-02"></i>
    <span>Mi perfil</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-settings-gear-65"></i>
    <span>Configuracion</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-calendar-grid-58"></i>
    <span>Mis Citas</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-support-16"></i>
    <span>Suporte</span>
  </a>
  <div class="dropdown-divider"></div>
  <a href="" class="dropdown-item"onclick="event.preventDefault();
  document.getElementById('formLogout')">
    <i class="ni ni-user-run"></i>
    <span>Cerrar Sesion</span>
  </a>
  <form class="" action="{{ route('logout') }}"
  method="post" id="formLogout" style="display: none;">

  </form>
</div>
