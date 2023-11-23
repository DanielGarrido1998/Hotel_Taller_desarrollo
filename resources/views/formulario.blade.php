@extends('layouts.base')

@section('content')
<div>
    <nav>
        <a href="">Preguntas frecuentes</a>
        <a href="{{route('home.create')}}">Reservas</a>
        <a href="{{route('home.index')}}">Inicio</a>
    </nav>
    <h3 class="res_title">Haz tu reserva ahora!</h3>

    <!--@ dump($errors)-->
    <form action="{{route('habitaciones')}}" method="POST" class="formulario">
        @csrf
        <div class="formulario">
            <div class="container mt-3">
                <h4 class="my-3">Formulario de reserva</h4>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">Ingrese cantidad de adultos:</label>
                        <input name="adultos" class="form-control" type="number" placeholder="maximo 2" value="{{ old('adultos') }}">
                        @error('adultos')
                            <small style=" color : red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                        <label for="">Ingrese cantidad de niños:</label>
                        <input name="menores" class="form-control" type="number" placeholder="maximo 2" value="{{ old('infantes') }}">
                        @error('menores')
                            <small style=" color : red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">dia de entrada:</label>
                        <input name="fecha_ingreso" class="form-control" min="{{ now()->toDateString() }}" type="date" value="{{ old('fecha_ingreso') }}" required>
                        @error('fecha_ingreso')
                            <small style=" color : red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 my-2">
                        <label for="">dia de salida:</label>
                        <input name="fecha_salida" class="form-control" min="{{ now()->toDateString() }}" type="date" value="{{ old('fecha_salida') }}" required>
                        @error('fecha_salida')
                            <small style=" color : red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <br>
                <br>
                <div class="boton">
                    <button class="btn btn-primary" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113);width: 90%; max-width: 350px;" type="submit">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>

