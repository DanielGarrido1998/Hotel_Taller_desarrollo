<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, rgb(150, 0, 112), rgb(228, 2, 171), rgb(255, 255, 255));">
    <div class="container">
        <a class="navbar-brand" href="">Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('adreservas')); ?>">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('adadministradores')); ?>">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('adhabitaciones')); ?>">Habitaciones</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>"  style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Editar Habitación</h1><hr><br>
    <form action="<?php echo e(route('updatehabitacion',['nummero_habitacion'=>$habitacion->numero_habitacion])); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- Usar PUT para actualizar la habitación -->

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="numero_habitacion">Número de Habitación</label>
                    <input type="number" name="numero_habitacion" value="<?php echo e($habitacion->numero_habitacion); ?>" class="form-control">
                    <?php $__errorArgs = ['numero_habitacion'];
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
            <div class="col">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" value="<?php echo e($habitacion->descripcion); ?>" class="form-control">
                    <?php $__errorArgs = ['descripcion'];
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
            <div class="col">
                <div class="form-group">
                    <label for="tipo_habitacion">Tipo de habitación</label>
                    <select name="tipo_habitacion" class="form-control">
                        <option value="Premium" <?php echo e($habitacion->id_tipo_habitacion === 2 ? 'selected' : ''); ?>>Premium</option>
                        <option value="Normal" <?php echo e($habitacion->id_tipo_habitacion === 1 ? 'selected' : ''); ?>>Normal</option>
                    </select>
                    <?php $__errorArgs = ['tipo_habitacion'];
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
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="capacidad">Capacidad</label>
                    <input type="number" name="capacidad" value="<?php echo e($habitacion->capacidad); ?>" class="form-control">
                    <?php $__errorArgs = ['capacidad'];
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
            <div class="col">
                <div class="form-group">
                    <label for="precio_por_noche">Precio por Noche</label>
                    <input type="number" name="precio_por_noche" value="<?php echo e($habitacion->precio_por_noche); ?>" class="form-control">
                    <?php $__errorArgs = ['precio_por_noche'];
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
            <div class="col">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="Libre" <?php echo e($habitacion->estado === 'Libre' ? 'selected' : ''); ?>>Libre</option>
                        <option value="Ocupada" <?php echo e($habitacion->estado === 'Ocupada' ? 'selected' : ''); ?>>Ocupada</option>
                    </select>
                    <?php $__errorArgs = ['estado'];
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
        </div><br><br>

        <div class="form-group">
            <button type="submit" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-primary form-control">Guardar</button>
        </div>
    </form>
</div>



<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/edithabitacion.blade.php ENDPATH**/ ?>