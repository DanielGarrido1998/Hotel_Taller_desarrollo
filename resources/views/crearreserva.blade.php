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
    <h1 class="text-center">Crear Reserva</h1><hr><br>
    <form action="{{route('ingresarreserva')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre Cliente</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido Cliente</label>
                    <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
                    @error('apellido')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="correo">Correo del Cliente</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo_identificacion">Tipo identificación</label>
                    <select name="tipo_identificacion" class="form-select">
                        <option>RUT</option>
                        <option>PASAPORTE</option>
                    </select>
                    @error('tipo_identificacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identificacion">Identificación</label>
                    <input type="text" name="identificacion" class="form-control" value="{{ old('identificacion') }}">
                    @error('identificacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tarjeta">N°tarjeta</label>
                    <input type="number" name="tarjeta" class="form-control" value="{{ old('tarjeta') }}">
                    @error('tarjeta')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_habitacion">Número de Habitación</label>
                    <select name="numero_habitacion" class="form-select">
                        @foreach($habitacionesLibres as $habitacion)
                            <option value="{{ $habitacion->numero_habitacion }}">
                                Habitación {{ $habitacion->numero_habitacion }}
                            </option>
                        @endforeach
                    </select>
                    @error('numero_habitacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="cantidad_adultos">Huespedes adultos</label>
                        <input type="number" name="cantidad_adultos" class="form-control" value="{{ old('cantidad_adultos') }}">
                        @error('cantidad_adultos')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="cantidad_menores">Huespedes menores</label>
                        <input type="number" name="cantidad_menores" class="form-control" value="{{ old('cantidad_menores') }}">
                        @error('cantidad_menores')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" min="{{ now()->toDateString() }}" class="form-control" value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" min="{{ now()->toDateString() }}" class="form-control" value="{{ old('fecha_fin') }}">
                    @error('fecha_fin')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div><br><br>
            <div class="form-group">
                <button type="submit" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-primary form-control">Guardar</button>
            </div>
    </form>
</div>

