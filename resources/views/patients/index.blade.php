@extends('layouts.panel')
<!-- ESTA VISTA CREO QUE ES DONDE SALE UN CUADRITO QUE MUESTRA EL NOMBRE, LA TRAE POR DEFECTO LARAVEL Y SE MIESTRA AL INICIAR SESION-->
@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Pacientes</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients/create') }}" class="btn btn-sm btn-primary">Nuevo Paciente</a>
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
          <th scope="col">Nombre</th>
          <th scope="col">E-mail</th>
          <th scope="col">DPI</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($patients as $patient)
        <tr>
          <th scope="row">
            {{$patient->name}}
          </th>
          <td>
            {{$patient->email}}
          </td>
          <td>
            {{$patient->dpi}}
          </td>
          <td>
            <form class="" action="{{ url('/patients/'.$patient->id) }}" method="post">
              @csrf
              @method('DELETE')
              <!--Probar hacer esto con onclick usar referencia en app.balde.php-->
              <a href="{{ url('/patients/'.$patient->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>

              <button href="" class="btn btn-sm btn-danger" type="submit" >Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <div class="card-body">
    {{ $patients->links()}}
  </div>
</div>

@endsection
