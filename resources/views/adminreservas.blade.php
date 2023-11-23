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
    <h1 class="text-center">Reservas</h1><hr><br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped table-borderless table-hover">
        <thead class="table" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">ID Reserva</th>
                <th class="align-middle">Nombre Cliente</th>
                <th class="align-middle">Identificacion</th>
                <th class="align-middle">Correo del Cliente</th>
                <th class="align-middle">Número de Habitación</th>
                <th class="align-middle">Huespedes adultos</th>
                <th class="align-middle">Huespedes menores</th>
                <th class="align-middle">Fecha Inicio</th>
                <th class="align-middle">Fecha Fin</th>
                <th class="align-middle">Check-in</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id_reserva }}</td>
                    <td>{{ $reserva->cliente->nombre }} {{ $reserva->cliente->apellido }}</td>
                    <td>{{$reserva->cliente->identificacion}}</td>
                    <td>{{ $reserva->cliente->correo }}</td>
                    <td>{{ $reserva->habitacion->numero_habitacion }}</td>
                    <td>{{ $reserva->cantidad_adultos}}</td>
                    <td>{{$reserva->cantidad_menores}}</td>
                    <td>{{ $reserva->fecha_inicio }}</td>
                    <td>{{ $reserva->fecha_fin }}</td>
                    <td class="@if($reserva->check_in === 'CHECKED') text-success @elseif($reserva->check_in === 'PENDIENTE') text-danger @endif">
                        {{ $reserva->check_in }}
                    </td>
                    <td><a href="{{route('check' , ['id_reserva' => $reserva->id_reserva])}}" class="btn btn-success" onclick="return confirm('¿Quiere confirmar el Check-in de esta reserva?')">Check</a></td>
                    <td><a href="{{route('editreserva', ['id_reserva' => $reserva->id_reserva])}}" class="btn btn-secondary">Editar</a></td>
                    <td><a href="{{route('eliminarreserva',['id_reserva' => $reserva->id_reserva])}}" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar esta reserva? Tambien eliminará los datos del cliente.')">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div>
        <a href="{{route('crearreserva')}}" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
    </div>
</div>
