@extends('layouts.adminbase')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, rgb(150, 0, 112), rgb(228, 2, 171), rgb(255, 255, 255));">
    <div class="container">
        <a class="navbar-brand" href="">Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adreservas')}}">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adadministradores')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adhabitaciones')}}">Habitaciones</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}"  style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center">Editar Empleados</h1>
    <hr>
    <form action="{{ route('updateadministrador')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="id_user">Id Empleado</label>
                    <input type="text" name="id_empleado" value="{{ $empleado->id_empleado }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido materno</label>
                    <input type="text" name="apellido_materno" value="{{ $empleado->apemat}}" class="form-control">
                    @error('apellido_materno')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipo_identificacion">Tipo Identificación</label>
                    <select name="tipo_identificacion" class="form-control">
                        <option value="RUT" @if ($empleado->tipo_identificacion === 'RUT') selected @endif>RUT</option>
                        <option value="PASAPORTE" @if ($empleado->tipo_identificacion === 'Pasaporte') selected @endif>PASAPORTE</option>
                    </select>
                    @error('tipo_identificacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" value="{{ $empleado->empleadoUsuario->usuario->correo }}" class="form-control">
                    @error('correo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <input type="text" name="rol" value="{{ $empleado->rol->nombre_rol }}" class="form-control" readonly>
                    @error('rol')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" value="{{ $empleado->apepat}}" class="form-control">
                    @error('apellido_paterno')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Nombre Usuario</label>
                    <input type="text" name="username" value="{{ $empleado->empleadoUsuario->usuario->username }}" class="form-control">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="identificacion">Identificación</label>
                    <input type="text" name="identificacion" value="{{ $empleado->identificacion }}" class="form-control">
                    @error('identificacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="form-control">
                    @error('telefono')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-primary btn-block mt-4">Guardar</button>
    </form>
</div>
