<?php $__env->startSection('content'); ?>
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="">Reservas</a>
    <a href="">Inicio</a>
</nav>
<br>
<div class="habitacion">
    <h2>Seleccione tipo de Habitación</h2>
    <br>
    <br>
    <div class=" row justify-content-center align-items-center">
        <div class="card me-4" style="width: 30rem;">
            <img src="/img/normal_room.png" class="card-img-top mt-2" alt="habitacion normal">
            <div class="card-body">
              <h4 class="card-title">Habitación Normal</h4>
              <p class="card-text">Una descipción breve de la habitación normal que se está ofreciendo.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Un item extra</li>
              <li class="list-group-item">Otro item extra</li>
            </ul>
            <div class="card-body">
                <a href="" class="btn btn-primary custom_button">Habitacion Normal</a>
            </div>
        </div>
        <div class="card ms-4" style="width: 30rem;">
            <img src="\img\premium_room.png" class="card-img-top mt-2" alt="">
            <div class="card-body">
              <h4 class="card-title">Habitación Premium</h4>
              <p class="card-text">Una descipción breve de la habitación premium que se está ofreciendo.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Un item extra</li>
                <li class="list-group-item">Otro item extra</li>
            </ul>
            <div class="card-body">
                <a href="" class="btn btn-primary custom_button">Habitacion Premium</a>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hotel_laravel_test\resources\views/habitacion.blade.php ENDPATH**/ ?>