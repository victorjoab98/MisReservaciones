@extends('layouts.panel')
<!-- ESTA VISTA CREO QUE ES DONDE SALE UN CUADRITO QUE MUESTRA EL NOMBRE, LA TRAE POR DEFECTO LARAVEL Y SE MIESTRA AL INICIAR SESION-->
@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Editar Especialidad</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">Cancelar y Volver</a>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </div>

    @endif
    <form action="{{ url('/specialties/'.$specialty->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre de la Especialidad</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $specialty->name)}}" required>
      </div>
      <div class="form-group">
        <label for="description">Descripcion de la Especialidad</label>
        <input type="text" name="description" class="form-control"  value="{{ old('description', $specialty->description) }}" required>
      </div>
      <button type="submit" class="btn btn-primary" name="button">Guardar</button>
    </form>
  </div>

</div>

@endsection
