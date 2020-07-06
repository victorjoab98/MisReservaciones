@extends('layouts.panel')
<!-- ESTA VISTA CREO QUE ES DONDE SALE UN CUADRITO QUE MUESTRA EL NOMBRE, LA TRAE POR DEFECTO LARAVEL Y SE MIESTRA AL INICIAR SESION-->
@section('content')
<form class="" action="{{ url('/schedule') }}" method="post">
  @csrf
  method('POST')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Gestionar Horario</h3>
        </div>
        <div class="col text-right">
          <button type="submit"class="btn btn-sm btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </div>
  <!--Notificacion de una nueva Especialidad guardada, solo se mostrara si existe la notification-->
    @if(session('notification'))<!--se usa session pues la variable viene como redirect-->
      <div class="card-body">
        <div class="alert alert-success" role="alert">
          {{session('notification')}}
        </div>
      </div>
    @endif

  <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Dia</th>
            <th scope="col">Activo</th>
            <th scope="col">Turno Mañana</th>
            <th scope="col">Turno Tarde</th>
          </tr>
        </thead>
        <tbody>
          @foreach($days as $key => $day)
            <tr>
              <th>{{ $day }}</th>
              <td>
                <label class="custom-toggle">
                  <input type="checkbox" checked name="active[]" value="{{ $key }}">
                  <span class="custom-toggle-slider rounded-circle"></span>
                </label>
              </td>
              <td>
                <div class="row">
                  <div class="col">
                    <select class="form-control" name="morning_start[]">
                      @for($i=5; $i<=11; $i++)
                      <option value="{{ $i }}:00">{{ $i }}:00 am</option>
                      <option value="{{ $i }}:30">{{ $i }}:30 am</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control" name="morning_end[]">
                      @for($i=5; $i<=11; $i++)
                      <option value="{{ $i }}:00">{{ $i }}:00 am</option>
                      <option value="{{ $i }}:30">{{ $i }}:30 am</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="col">
                    <select class="form-control" name="afternoon_start[]">
                      @for($i=1; $i<=11; $i++)
                        <option value="{{ $i+12 }}:00">{{ $i }}:00 pm</option>
                        <option value="{{ $i+12 }}:30">{{ $i }}:30 pm</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control" name="afternoon_end[]">
                      @for($i=1; $i<=11; $i++)
                        <option value="{{ $i+12 }}:00">{{ $i }}:00 pm</option>
                        <option value="{{ $i+12 }}:30">{{ $i }}:30 pm</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
</form>

@endsection
