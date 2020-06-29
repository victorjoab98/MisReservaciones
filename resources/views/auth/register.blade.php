@extends('layouts.form')
@section('title', 'Registrate')
@section('content')
<div class="container mt--8 pb-5">
  <!-- Table -->
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">

          @if ($errors->any())
            <div class="text-center text-muted mb-4">
              <small>Upps! Ha ocurrido un error</small>
            </div>
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> {{ $errors->first() }}
                </div>
          @else
            <div class="text-center text-muted mb-4">
              <small>Ingresa tus datos para registrarte</small>
            </div>
          @endif


            <!-- FORMULARIO -->
          <form role="form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required  >
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required >
              </div>
            </div>

            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password" name="password" required >
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Confirmar Password" type="password" name="password_confirmation" required >
              </div>
            </div>

            <div class="row my-4">
              <div class="col-12">
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                  <label class="custom-control-label" for="customCheckRegister">
                    <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="Submit" class="btn btn-primary mt-4">Confirmar Registro</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
