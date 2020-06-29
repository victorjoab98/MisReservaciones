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
            <a href="" class="btn btn-sm btn-primary">Editar</>
            <a href="" class="btn btn-sm btn-danger">Eliminar</>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
