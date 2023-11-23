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
    <h1 class="text-center">Editar Reserva</h1><hr><br>
    <form action="{{route('updatereserva') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="id_reserva">ID Reserva</label>
                    <input type="text" name="id_reserva" value="{{ $reserva->id_reserva }}" class="form-control" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nombre">Nombre Cliente</label>
                    <input type="text" name="nombre" value="{{ $reserva->cliente->nombre }}" class="form-control">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="apellido">Apellido Cliente</label>
                    <input type="text" name = "apellido" value="{{ $reserva->cliente->apellido }}" class="form-control">
                    @error('apellido')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="apellido">Identificación</label>
                    <input type="text" name = "identificacion" value="{{ $reserva->cliente->identificacion }}" class="form-control">
                    @error('identificacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div form-group>
                    <label for="correo">Correo del Cliente</label>
                    <input type="email" name="correo" value="{{ $reserva->cliente->correo }}" class="form-control">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="numero_habitacion">Número de Habitación</label>
                    <select name="numero_habitacion" class="form-control">
                        <option value="{{ $reserva->numero_habitacion }}" selected>
                            {{ $reserva->numero_habitacion }} (Actual)
                        </option>
                        @foreach ($habitaciones_disponibles as $habitacion_dis)
                            <option value="{{ $habitacion_dis->numero_habitacion }}">
                                {{ $habitacion_dis->numero_habitacion }}
                                @if ($habitacion_dis->id_tipo_habitacion === 1)
                                    (Normal)
                                @elseif ($habitacion_dis->id_tipo_habitacion === 2)
                                    (Premium)
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('numero_habitacion')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="cantidad_adultos">Huespedes adultos</label>
                    <input type="number" name="cantidad_adultos" class="form-control" value="{{$reserva->cantidad_adultos}}">
                    @error('cantidad_adultos')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="cantidad_menores">Huespedes menores</label>
                    <input type="number" name="cantidad_menores" class="form-control" value="{{$reserva->cantidad_menores}}">
                    @error('cantidad_menores')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" min="{{ now()->toDateString() }}" value="{{ $reserva->fecha_inicio->format('Y-m-d') }}" class="form-control">
                    @error('fecha_inicio')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" min="{{ now()->toDateString() }}" value="{{ $reserva->fecha_fin->format('Y-m-d') }}" class="form-control">
                    @error('fecha_fin')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="check">Check-in</label>
                    <select name="check" class="form-control">
                        <option value="CHECKED" @if ($reserva->check_in === 'CHECKED') selected @endif>CHECKED</option>
                        <option value="PENDIENTE" @if ($reserva->check_in === 'PENDIENTE') selected @endif>PENDIENTE</option>
                    </select>
                    @error('check')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div><br><br>
        <div class="col">
            <div class="form-group">
                <button type="submit" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-primary form-control">Guardar</button>
            </div>
        </div>
    </form>
</div>



