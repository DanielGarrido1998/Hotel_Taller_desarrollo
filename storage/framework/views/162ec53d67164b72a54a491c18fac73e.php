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
    <h1 class="text-center">Reservas</h1><hr><br>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Reserva</th>
                <th>Nombre del Cliente</th>
                <th>Correo del Cliente</th>
                <th>Número de Habitación</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Acción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($reserva->id_reserva); ?></td>
                    <td><?php echo e($reserva->cliente->user->nombre); ?> <?php echo e($reserva->cliente->user->apellido); ?></td>
                    <td><?php echo e($reserva->cliente->user->correo); ?></td>
                    <td><?php echo e($reserva->habitacion->numero_habitacion); ?></td>
                    <td><?php echo e($reserva->fecha_inicio); ?></td>
                    <td><?php echo e($reserva->fecha_fin); ?></td>
                    <td><a href="<?php echo e(route('editreserva', ['id_reserva' => $reserva->id_reserva])); ?>" class="btn btn-primary">Editar</a></td>
                    <td><a href="<?php echo e(route('eliminarreserva',['id_reserva' => $reserva->id_reserva])); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar esta reserva? Tambien eliminará los datos del cliente.')">Eliminar</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <div>
        <a href="<?php echo e(route('crearreserva')); ?>" class="btn btn-success">Agregar</a>
    </div>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/adminreservas.blade.php ENDPATH**/ ?>