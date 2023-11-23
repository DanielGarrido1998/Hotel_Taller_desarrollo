<?php $__env->startSection('content'); ?>
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="<?php echo e(route('home.create')); ?>">Reservas</a>
    <a href="<?php echo e(route('home.index')); ?>">Inicio</a>
</nav>
<div class="container">
    <div>
        <script>
            window.open("<?php echo e(route('comprobantepdf')); ?>", "_blank");
        </script>
        <h3 class="res_title">Reserva Exitosa!</h3>
        <h4 class="res_title">Gracias por preferirnos!</h4><br><br><br><br><br><br>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card" style="width: 30rem;">
                <div class="card-body my-2">
                    <h4>Hotel</h4><br>
                    <h5>Fecha de reserva: <?php echo e(date('d-m-Y')); ?></h5>
                    <h5 class="res_tilte">Boleta de Reserva</h5>
                    <?php if(isset($reserva)): ?>
                        <h5 class="card-title">N° Reserva: <?php echo e($reserva->id_reserva); ?></h5><hr>
                        <h5 class="card-subtitle mb-2 text-muted">Cliente</h5>
                        <p class="card-text"><strong>Nombre:</strong> <?php echo e($reserva->cliente->nombre); ?></p>
                        <p class="card-text"><strong>Apellido:</strong> <?php echo e($reserva->cliente->apellido); ?></p>
                        <p class="card-text"><strong>Correo:</strong> <?php echo e($reserva->cliente->correo); ?></p>
                        <p class="card-text"><strong>Tipo Identificación:</strong> <?php echo e($reserva->cliente->tipo_identificacion); ?></p>
                        <p class="card-text"><strong>Identificación:</strong> <?php echo e($reserva->cliente->identificacion); ?></p>

                        <h6 class="card-subtitle mb-2 text-muted mt-4">Habitación</h6>
                        <p class="card-text"><strong>N° Habitación:</strong> <?php echo e($reserva->habitacion->numero_habitacion); ?></p>
                        <p class="card-text"><strong>Valor por Noche:</strong> $<?php echo e($reserva->habitacion->precio_por_noche); ?></p>
                        <p class="card-text"><strong>Tipo de Habitación:</strong>
                            <?php if($reserva->habitacion->id_tipo_habitacion == 1): ?>
                                Normal
                            <?php elseif($reserva->habitacion->id_tipo_habitacion == 2): ?>
                                Premium
                            <?php endif; ?>
                        <h6 class="card-subtitle mb-2 text-muted mt-4">Detalles de la Reserva</h6>
                        <p class="card-text"><strong>Cantidad huespedes adultos: </strong><?php echo e($reserva->cantidad_adultos); ?></p>
                        <p class="card-text"><strong>Cantidad huespedes menores: </strong><?php echo e($reserva->cantidad_menores); ?></p>
                        <p class="card-text"><strong>Fecha de Inicio:</strong> <?php echo e($reserva->fecha_inicio); ?></p>
                        <p class="card-text"><strong>Fecha de Fin:</strong> <?php echo e($reserva->fecha_fin); ?></p><br>
                        <p>comprobante de reserva Hotel, recuerde guardarlo para ser presentado en el hotel</p>
                    <?php else: ?>
                        <p>No se encontró una reserva con el ID proporcionado.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br><br>
        <div class="col text-center">
            <a href="<?php echo e(route('comprobantepdf')); ?>" target="_blank" class="btn btn-primary custom_buttom" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113); width: 90%;
            max-width: 450px;">Descargar Comprobante</a><br><br>
        </div>
        <div class="col text-center">
            <a href="<?php echo e(route('home.index')); ?>" class="btn btn-primary custom_buttom" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113); width: 90%;
            max-width: 450px;">Volver pagina principal</a>
        </div>
    </div>
</div>



<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/success.blade.php ENDPATH**/ ?>