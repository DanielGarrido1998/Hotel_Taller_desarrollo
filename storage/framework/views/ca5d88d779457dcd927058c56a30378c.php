<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-lg navbar-dark"  style="background: linear-gradient(to right, rgb(150, 0, 112), rgb(228, 2, 171), rgb(255, 255, 255));">
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
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>" style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
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
    <?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
    <table class="table table-striped table-borderless table-hover">
        <thead class="table border-0" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">Número de Habitación</th>
                <th class="align-middle">Descripción</th>
                <th class="align-middle">Tipo Habitación</th>
                <th class="align-middle">Capacidad</th>
                <th class="align-middle">Precio por Noche</th>
                <th class="align-middle">Estado</th>
                <th class="align-middle">Accion</th>
                <th class="align-middle">Accion</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <?php $__currentLoopData = $habitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($habitacion->numero_habitacion); ?></td>
                    <td><?php echo e($habitacion->descripcion); ?></td>
                    <td>
                        <?php if($habitacion->id_tipo_habitacion == 1): ?>
                                Normal
                            <?php elseif($habitacion->id_tipo_habitacion == 2): ?>
                            <span class="text-primary">Premium</span>
                            <?php endif; ?>
                    </td>
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
                        <a href="<?php echo e(route('edithabitacion', ['numero_habitacion' => $habitacion->numero_habitacion])); ?>" class="btn btn-secondary">Editar</a>
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
        <a href="<?php echo e(route('crearhabitacion')); ?>" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
    </div>

</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/adminhabitaciones.blade.php ENDPATH**/ ?>