<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Administración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div>
<div class="container">
    <div>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card" style="width: 30rem;">
                <div class="card-body my-2">
                    <h1>Hotel</h1><br>
                    <h6>Fecha de reserva: {{ date('d-m-Y') }}</h6>
                    <h6 class="res_tilte">Boleta de Reserva</h6>
                    @if(isset($reserva))
                        <h6 class="card-title">N° Reserva: {{ $reserva->id_reserva }}</h6><hr>
                        <h5 class="card-subtitle mb-2 text-muted">Cliente</h5>
                        <p class="card-text"><strong>Nombre:</strong> {{ $reserva->cliente->nombre }}</p>
                        <p class="card-text"><strong>Apellido:</strong> {{ $reserva->cliente->apellido }}</p>
                        <p class="card-text"><strong>Correo:</strong> {{ $reserva->cliente->correo }}</p>
                        <p class="card-text"><strong>Tipo Identificación:</strong> {{ $reserva->cliente->tipo_identificacion }}</p>
                        <p class="card-text"><strong>Identificación:</strong> {{ $reserva->cliente->identificacion }}</p>

                        <h6 class="card-subtitle mb-2 text-muted mt-4">Habitación</h6>
                        <p class="card-text"><strong>N° Habitación:</strong> {{ $reserva->habitacion->numero_habitacion }}</p>
                        <p class="card-text"><strong>Valor por Noche:</strong> ${{ $reserva->habitacion->precio_por_noche }}</p>
                        <p class="card-text"><strong>Tipo de Habitación:</strong>
                            @if($reserva->habitacion->id_tipo_habitacion == 1)
                                Normal
                            @elseif($reserva->habitacion->id_tipo_habitacion == 2)
                                Premium
                            @endif
                        <h6 class="card-subtitle mb-2 text-muted mt-4">Detalles de la Reserva</h6>
                        <p class="card-text"><strong>Cantidad huespedes adultos: </strong>{{$reserva->cantidad_adultos}}</p>
                        <p class="card-text"><strong>Cantidad huespedes menores: </strong>{{$reserva->cantidad_menores}}</p>
                        <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $reserva->fecha_inicio }}</p>
                        <p class="card-text"><strong>Fecha de Fin:</strong> {{ $reserva->fecha_fin }}</p><br>
                        <p>comprobante de reserva Hotel, recuerde guardarlo para ser presentado en el hotel</p>
                    @else
                        <p>No se encontró una reserva con el ID proporcionado.</p>
                    @endif
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<footer>
    <h4>Contacto</h4>
    <ul>
        <li>Direccion: Av. picarte 1999</li>
        <li>Correo electronico xxxxxx.xxxxx@inacapmail.cl</li>
        <li>Numero de telefono: +56942047777</li>
    </ul>
</footer>
</body>
</html>
