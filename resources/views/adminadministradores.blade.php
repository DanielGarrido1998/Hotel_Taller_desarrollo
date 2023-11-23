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
                    <a class="nav-link" href="{{route('logout')}}"  style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Empleados</h1><hr><br>
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
        <thead class="table" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">ID Administrador</th>
                <th class="align-middle">Nombre</th>
                <th class="align-middle">Apellidos</th>
                <th class="align-middle">Tipo Identificación</th>
                <th class="align-middle">Identificación</th>
                <th class="align-middle">Correo</th>
                <th class="align-middle">Nombre Usuario</th>
                <th class="align-middle">Telefono</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody class="table-bordered">
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id_empleado }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apepat }}  {{$empleado->apemat}}</td>
                    <td>{{ $empleado->tipo_identificacion }}</td>
                    <td>{{ $empleado->identificacion }}</td>
                    <td>{{ $empleado->empleadoUsuario->usuario->correo }}</td>
                    <td>{{ $empleado->empleadoUsuario->usuario->username }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td><a href="{{ route('editadministrador', ['id_empleado' => $empleado->id_empleado]) }}" class="btn btn-secondary">Editar</a></td>
                    <td><a href="{{ route('eliminaradministrador', ['id_empleado' => $empleado->id_empleado]) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este administrador?')">Eliminar</a></td>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <a href="{{ route('crearadministrador')}}" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
</div>
