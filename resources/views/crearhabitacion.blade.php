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
    <h1 class="text-center">Crear Habitación</h1><hr><br>
    <form action="{{route('ingresarhabitacion')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="numero_habitacion">Número de Habitación</label>
                    <input type="number" name="numero_habitacion" id="numero_habitacion" class="form-control" value="{{ old('numero_habitacion') }}">
                    @error('numero_habitacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tipo">Tipo de Habitación</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option>Premium</option>
                        <option>Normal</option>
                    </select>
                    @error('tipo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}">
                    @error('descripcion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="capacidad">Capacidad</label>
                    <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad') }}">
                    @error('capacidad')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="precio_por_noche">Precio por Noche</label>
                    <input type="number" name="precio_por_noche" id="precio_por_noche" class="form-control" value="{{ old('precio_por_noche') }}">
                    @error('precio_por_noche')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option>Libre</option>
                        <option>Ocupada</option>
                    </select>
                    @error('estado')
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

