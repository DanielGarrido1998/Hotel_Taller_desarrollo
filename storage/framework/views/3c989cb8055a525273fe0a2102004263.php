<?php $__env->startSection('content'); ?>
<div>
    <nav>
        <a href="">Preguntas frecuentes</a>
        <a href="">Reservas</a>
        <a href="<?php echo e(route('index.index')); ?>">Inicio</a>
    </nav>
    <h3 class="res_title">Haz tu reserva ahora!</h3>
    <div class="formulario">
        <div class="container mt-3">
            <h4 class="my-3">Formulario de reserva</h4>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Ingrese cantidad de adultos:</label>
                    <input id="adult" class="form-control" type="number" placeholder="maximo 2">
                </div>
                <div class="col-6 my-2">
                    <label for="">Ingrese cantidad de niños:</label>
                    <input id="kid" class="form-control" type="number" placeholder="maximo 2">
                </div>
            </div>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">dia de entrada:</label>
                    <input class="form-control" type="date">
                </div>
                <div class="col-6 my-2">
                    <label for="">dia de entrada:</label>
                    <input class="form-control" type="date">
                </div>
            </div>
            <br>
            <br>
            <div class="boton">
                <a href="" class="btn btn-primary custom_button">Siguiente</a>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hotel_laravel_test\resources\views/formulario.blade.php ENDPATH**/ ?>