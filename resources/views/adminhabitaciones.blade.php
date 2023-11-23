@extends('layouts.adminbase')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark"  style="background: linear-gradient(to right, rgb(150, 0, 112), rgb(228, 2, 171), rgb(255, 255, 255));">
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
                    <a class="nav-link" href="{{route('logout')}}" style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Habitaciones</h1><hr><br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <table class="table table-striped table-borderless table-hover">
        <thead class="table border-0" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">Número de Habitación</th>
                <th class="align-middle">Descripción</th>
                <th class="align-middle">Tipo Habitación</th>
                <th class="align-middle">Capacidad</th>
                <th class="align-middle">Precio por Noche</th>
                <th class="align-middle">Estado</th>
                <th class="align-middle">Accion</th>
                <th class="align-middle">Accion</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            @foreach($habitaciones as $habitacion)
                <tr>
                    <td>{{ $habitacion->numero_habitacion }}</td>
                    <td>{{ $habitacion->descripcion }}</td>
                    <td>
                        @if($habitacion->id_tipo_habitacion == 1)
                                Normal
                            @elseif($habitacion->id_tipo_habitacion == 2)
                            <span class="text-primary">Premium</span>
                            @endif
                    </td>
                    <td>{{ $habitacion->capacidad }}</td>
                    <td>CLP ${{ number_format($habitacion->precio_por_noche, 2) }}</td>
                    <td>
                        @if ($habitacion->estado == 'Libre')
                            <span class="text-primary">Libre</span>
                        @elseif ($habitacion->estado == 'Ocupada')
                            <span class="text-danger">Ocupada</span>
                        @else
                            {{ $habitacion->estado }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edithabitacion', ['numero_habitacion' => $habitacion->numero_habitacion]) }}" class="btn btn-secondary">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('eliminarhabitacion', ['numero_habitacion' => $habitacion->numero_habitacion]) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta habitación?')">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div>
        <a href="{{route('crearhabitacion')}}" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
    </div>

</div>
