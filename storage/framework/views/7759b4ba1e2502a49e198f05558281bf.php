<?php $__env->startSection('content'); ?>
<nav>
    <a href="">Preguntas frecuentes</a>
    <a href="<?php echo e(route('home.create')); ?>">Reservas</a>
    <a href="<?php echo e(route('home.index')); ?>">Inicio</a>
</nav>
<h3 class="res_title">Haz tu reserva ahora!</h3>
<!--@ dump($errors)-->
<form action="<?php echo e(route('ingreso', ['menores' => $menores,'adultos' => $adultos,'fecha_ingreso' =>$fecha_ingreso, 'fecha_salida' =>$fecha_salida, 'habitacion' => $habitacion])); ?>" method="POST" class="formulario">
    <?php echo csrf_field(); ?>
    <div class="form">
        <div class="formulario">
            <fieldset disabled>
                <div class="container mt-3">
                    <h4 class="my-3">Detalles de reserva</h4>
                        <div class="row">
                            <div class="col">
                                <label for="">Tipo de Habitación:</label>
                                <input  class="form-control" type="text" placeholder="<?php echo e($habitacion); ?>">
                            </div>
                            <div class="col">
                                <label for="">Cantidad de huespedes adultos</label>
                                <input  class="form-control" type="number" placeholder="<?php echo e($adultos); ?>">
                            </div>
                            <div class="col">
                                <label for="">Cantidad de huespedes menores</label>
                                <input  class="form-control" type="number" placeholder="<?php echo e($menores); ?>">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Fecha ingreso:</label>
                            <input class="form-control" placeholder="<?php echo e($fecha_ingreso); ?>">
                        </div>
                        <div class="col-6 my-2">
                            <label for="">Fecha Salida:</label>
                            <input class="form-control" placeholder="<?php echo e($fecha_salida); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Valor:</label>
                            <input class="form-control" type="text" placeholder="$<?php echo e($valor); ?>">
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
                    <input name="nombre" class="form-control" type="text" placeholder="Nombre" value="<?php echo e(old('nombre')); ?>" required>
                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-6 my-2">
                    <label for="">Ingrese su apellido:</label>
                    <input name="apellido" class="form-control" type="text" placeholder="Apellido" value="<?php echo e(old('apellido')); ?>" required>
                    <?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-6 my-2">
                    <label for="tipo_identificacion">Tipo identificación</label>
                    <select name="tipo_identificacion" class="form-select">
                        <option>RUT</option>
                        <option>PASAPORTE</option>
                    </select>
                    <?php $__errorArgs = ['tipo_identificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6 my-2">
                    <label for="">Ingrese su rut/N°pasaporte:</label>
                    <input name="identificacion" class="form-control" type="text" placeholder="11111111-1" value="<?php echo e(old('identificacion')); ?>" required>
                    <?php $__errorArgs = ['identificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-6 my-2">
                    <label for="">Correo electronico:</label>
                    <input name="correo" class="form-control" type="email" placeholder="ejemplo@gmai.com" value="<?php echo e(old('correo')); ?>" required>
                    <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <div class="formulario">
            <div class="container mt-3">
                <h4 class="my-3">Metodo de pago:</h4>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">N° Tarjeta:</label>
                        <input name="tarjeta" class="form-control" type="text" placeholder="xxxx xxxx xxxx xxxx" value="<?php echo e(old('tarjeta')); ?>" required>
                        <?php $__errorArgs = ['tarjeta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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




<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/data.blade.php ENDPATH**/ ?>