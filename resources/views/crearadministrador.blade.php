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

<div class="container mt-5 mb-5">
    <h1 class="text-center">Crear Empleados</h1><hr><br>
    <form action="{{route('ingresaradministrador')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="apellido">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_materno" class="form-control"  value="{{ old('apellido_paterno') }}">
                    @error('apellido_paterno')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="apellido">Apellido materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"  value="{{ old('apellido_materno') }}">
                    @error('apellido_materno')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="tipo_identificacion">Tipo Identificación</label>
                    <select name="tipo_identificacion" id="tipo_identificacion" class="form-control">
                        <option>RUT</option>
                        <option>PASAPORTE</option>
                    </select>
                    @error('tipo_identificacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="identificacion">Identificación</label>
                    <input type="text" name="identificacion" id="identificacion" class="form-control"  value="{{ old('identificacion') }}">
                    @error('identificacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select name="rol" id="rol" class="form-control" >
                        <option value="">Seleccione un rol</option>
                        @foreach($roles as $rol)
                            <option value="{{$rol->nombre_rol}}">
                                {{$rol->nombre_rol}}
                            </option>
                        @endforeach
                    </select>
                    @error('rol')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control"  value="{{ old('username') }}">
                    @error('username')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control"  value="{{ old('correo') }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control"  value="{{ old('telefono') }}">
                    @error('telefono')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

<br><br>

        <div class="form-group">
            <button type="submit" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-primary form-control">Guardar</button>
        </div>
    </form>
</div>

