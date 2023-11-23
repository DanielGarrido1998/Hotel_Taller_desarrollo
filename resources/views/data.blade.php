@extends('layouts.base')

@section('content')
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="{{route('home.create')}}">Reservas</a>
    <a href="{{route('home.index')}}">Inicio</a>
</nav>
<h3 class="res_title">Haz tu reserva ahora!</h3>
<!--@ dump($errors)-->
<form action="{{route('ingreso', ['menores' => $menores,'adultos' => $adultos,'fecha_ingreso' =>$fecha_ingreso, 'fecha_salida' =>$fecha_salida, 'habitacion' => $habitacion])}}" method="POST" class="formulario">
    @csrf
    <div class="form">
        <div class="formulario">
            <fieldset disabled>
                <div class="container mt-3">
                    <h4 class="my-3">Detalles de reserva</h4>
                        <div class="row">
                            <div class="col">
                                <label for="">Tipo de Habitación:</label>
                                <input  class="form-control" type="text" placeholder="{{ $habitacion }}">
                            </div>
                            <div class="col">
                                <label for="">Cantidad de huespedes adultos</label>
                                <input  class="form-control" type="number" placeholder="{{$adultos}}">
                            </div>
                            <div class="col">
                                <label for="">Cantidad de huespedes menores</label>
                                <input  class="form-control" type="number" placeholder="{{$menores}}">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Fecha ingreso:</label>
                            <input class="form-control" placeholder="{{ $fecha_ingreso }}">
                        </div>
                        <div class="col-6 my-2">
                            <label for="">Fecha Salida:</label>
                            <input class="form-control" placeholder="{{ $fecha_salida }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Valor:</label>
                            <input class="form-control" type="text" placeholder="${{ $valor }}">
                        </div>
                    </div>
                </div>
            <fieldset>
        </div>
        <div class="container mt-3">
            <h4 class="my-3">Datos huesped</h4>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Ingrese su nombre:</label>
                    <input name="nombre" class="form-control" type="text" placeholder="Nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                            <small style=" color : red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 my-2">
                    <label for="">Ingrese su apellido:</label>
                    <input name="apellido" class="form-control" type="text" placeholder="Apellido" value="{{ old('apellido') }}" required>
                    @error('apellido')
                            <small style=" color : red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 my-2">
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
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Ingrese su rut/N°pasaporte:</label>
                    <input name="identificacion" class="form-control" type="text" placeholder="11111111-1" value="{{ old('identificacion') }}" required>
                    @error('identificacion')
                            <small style=" color : red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 my-2">
                    <label for="">Correo electronico:</label>
                    <input name="correo" class="form-control" type="email" placeholder="ejemplo@gmai.com" value="{{ old('correo') }}" required>
                    @error('correo')
                            <small style=" color : red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="formulario">
            <div class="container mt-3">
                <h4 class="my-3">Metodo de pago:</h4>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">N° Tarjeta:</label>
                        <input name="tarjeta" class="form-control" type="text" placeholder="xxxx xxxx xxxx xxxx" value="{{ old('tarjeta') }}" required>
                        @error('tarjeta')
                            <small style=" color : red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="boton">
        <button class="btn btn-primary" style="background-color: rgb(151, 0, 113);;border-color: rgb(151, 0, 113);width: 90%; max-width: 350px;" type="submit">Confirmar</button>
    </div>
</form>



