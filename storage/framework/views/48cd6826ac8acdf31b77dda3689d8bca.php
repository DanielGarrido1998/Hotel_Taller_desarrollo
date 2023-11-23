<?php $__env->startSection('content'); ?>
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="">Reservas</a>
    <a href="<?php echo e(route('index.index')); ?>">Inicio</a>
</nav>
<h3 class="res_title">Haz tu reserva ahora!</h3>
<div class="form">
    <div class="formulario">
        <fieldset disabled>
            <div class="container mt-3">
                <h4 class="my-3">Detalles de reserva</h4>
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Tipo de Habitación:</label>
                            <input id="" class="form-control" type="text" placeholder="Habitación xxxx">
                        </div>
                        <div class="col-6 my-2">
                            <label for="">Cantidad de huespedes</label>
                            <input id="" class="form-control" type="number" placeholder="4">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">Fecha ingreso:</label>
                        <input class="form-control" type="date">
                    </div>
                    <div class="col-6 my-2">
                        <label for="">Fecha Salida:</label>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">Valor:</label>
                        <input class="form-control" type="text" placeholder="$ 999.999">
                    </div>
                </div>
            </div>
        <fieldset>
    </div>
    <div class="formulario">
        <div class="container mt-3">
            <h4 class="my-3">Datos huesped</h4>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Ingrese su nombre:</label>
                    <input id="" class="form-control" type="text" placeholder="Nombre">
                </div>
                <div class="col-6 my-2">
                    <label for="">Ingrese su apellido:</label>
                    <input id="" class="form-control" type="text" placeholder="Apellido">
                </div>
            </div>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Correo electronico:</label>
                    <input class="form-control" type="email">
                </div>
                <div class="col-6 my-2">
                    <label for="">Telefono:</label>
                    <input class="form-control" type="tel">
                </div>
            </div>
        </div>
    </div>
    <div class="formulario">
        <div class="container mt-3">
            <h4 class="my-3">Metodo de pago:</h4>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Nombre titular:</label>
                    <input id="" class="form-control" type="text" placeholder="Nombre">
                </div>
                <div class="col-6 my-2">
                    <label for="">N° Tarjeta:</label>
                    <input id="" class="form-control" type="text" placeholder="xxxx xxxx xxxx xxxx">
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="boton">
    <a href="" class="btn btn-primary custom_button">Siguiente</a>
</div>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/form.blade.php ENDPATH**/ ?>