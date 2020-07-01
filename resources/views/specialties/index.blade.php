@extends('layouts.panel')
<!-- ESTA VISTA CREO QUE ES DONDE SALE UN CUADRITO QUE MUESTRA EL NOMBRE, LA TRAE POR DEFECTO LARAVEL Y SE MIESTRA AL INICIAR SESION-->
@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Especialidades</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('specialties/create') }}" class="btn btn-sm btn-primary">Nueva Especialidad</a>
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
          <th scope="col">Descripcion</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($specialties as $specialty)
        <tr>
          <th scope="row">
            {{$specialty->name}}
          </th>
          <td>
            {{$specialty->description}}
          </td>
          <td>
            <form class="" action="{{ url('/specialties/'.$specialty->id) }}" method="post">
              @csrf
              @method('DELETE')
              <!--Probar hacer esto con onclick usar referencia en app.balde.php-->
              <a href="{{ url('/specialties/'.$specialty->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>

              <button href="" class="btn btn-sm btn-danger" type="submit" >Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
