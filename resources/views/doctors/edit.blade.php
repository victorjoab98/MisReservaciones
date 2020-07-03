@extends('layouts.panel')
<!-- ESTA VISTA CREO QUE ES DONDE SALE UN CUADRITO QUE MUESTRA EL NOMBRE, LA TRAE POR DEFECTO LARAVEL Y SE MIESTRA AL INICIAR SESION-->
@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Editar Medico</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancelar y Volver</a>
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
    <form action="{{ url('/doctors/'.$doctor->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre del Medico</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control"  value="{{ old('email', $doctor->email) }}" required>
      </div>
      <div class="form-group">
        <label for="dpi">DPI</label>
        <input type="text" name="dpi" class="form-control"  value="{{ old('dpi', $doctor->dpi) }}" >
      </div>
      <div class="form-group">
          <label for="address">Direccion</label>
          <input type="text" name="address" class="form-control"  value="{{ old('address', $doctor->address) }}" >
      </div>
      <div class="form-group">
        <label for="phone">Telefono</label>
        <input type="text" name="phone" class="form-control"  value="{{ old('phone', $doctor->phone) }}" >
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="text" name="password" class="form-control"  value="" >
        <a>Ingrese un valor solo si desea modificar su Contraseña</a>

      </div>
      <button type="submit" class="btn btn-primary" name="button">Guardar</button>
    </form>
  </div>

</div>

@endsection
