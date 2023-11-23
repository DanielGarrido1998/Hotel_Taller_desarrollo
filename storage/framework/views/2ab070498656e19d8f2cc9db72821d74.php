<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <a class="nav-link" href="<?php echo e(route('adadministradores')); ?>">Administradores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('adhabitaciones')); ?>">Habitaciones</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Habitaciones</h1><hr><br>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Número de Habitación</th>
                <th>Descripción</th>
                <th>Capacidad</th>
                <th>Precio por Noche</th>
                <th>Estado</th>
                <th>Accion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $habitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($habitacion->numero_habitacion); ?></td>
                    <td><?php echo e($habitacion->descripcion); ?></td>
                    <td><?php echo e($habitacion->capacidad); ?></td>
                    <td>CLP $<?php echo e(number_format($habitacion->precio_por_noche, 2)); ?></td>
                    <td>
                        <?php if($habitacion->estado == 'Libre'): ?>
                            <span class="text-primary">Libre</span>
                        <?php elseif($habitacion->estado == 'Ocupada'): ?>
                            <span class="text-danger">Ocupada</span>
                        <?php else: ?>
                            <?php echo e($habitacion->estado); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('edithabitacion', ['numero_habitacion' => $habitacion->numero_habitacion])); ?>" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('eliminarhabitacion', ['numero_habitacion' => $habitacion->numero_habitacion])); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta habitación?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <div>
        <a href="<?php echo e(route('crearhabitacion')); ?>" class="btn btn-success">Agregar</a>
    </div>

</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/adminhabitaciones.blade.php ENDPATH**/ ?>