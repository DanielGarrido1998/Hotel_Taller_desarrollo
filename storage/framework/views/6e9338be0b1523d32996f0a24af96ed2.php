<?php $__env->startSection('content'); ?>
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="<?php echo e(route('home.create')); ?>">Reservas</a>
    <a href="<?php echo e(route('home.index')); ?>">Inicio</a>
</nav>
<br>
<div class="habitacion">
    <br>
    <br>
    <div class=" row justify-content-center align-items-center">
        <div class="card me-4" style="width: 30rem;">
            <img src="./img/normal_room.png" class="card-img-top mt-2" alt="habitacion normal">
            <div class="card-body">
              <h4 class="card-title">Habitación Normal</h4>
              <p class="card-text"><?php echo e($habitacion->descripcion); ?></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Capacidad: <?php echo e($habitacion->capacidad); ?></li>
              <li class="list-group-item">Valor: $<?php echo e($habitacion->precio_por_noche); ?></li>
            </ul>
            <div class="card-body">
                <a href="<?php echo e(route('data', ['fecha_ingreso' => $fecha_ingreso, 'fecha_salida' => $fecha_salida, 'habitacion' => 'Normal', 'valor' => $habitacion->precio_por_noche])); ?>" class="btn btn-primary custom_button">Habitación Normal</a>
            </div>
        </div>
        <div class="card ms-4" style="width: 30rem;">
            <img src=".\img\premium_room.png" class="card-img-top mt-2" alt="">
            <div class="card-body">
              <h4 class="card-title">Habitación Premium</h4>
              <p class="card-text"><?php echo e($habitacion_p->descripcion); ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Capacidad: <?php echo e($habitacion_p->capacidad); ?></li>
                <li class="list-group-item">Valor: $<?php echo e($habitacion_p->precio_por_noche); ?></li>
            </ul>
            <div class="card-body">
                <a href="<?php echo e(route('data', ['fecha_ingreso' =>$fecha_ingreso, 'fecha_salida' =>$fecha_salida, 'habitacion' => 'Premium', 'valor' => $habitacion_p->precio_por_noche])); ?>" class="btn btn-primary custom_button">Habitación Premium</a>
            </div>
        </div>
    </div>
</div>





<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/habitacion.blade.php ENDPATH**/ ?>