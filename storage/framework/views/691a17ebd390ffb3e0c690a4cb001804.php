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
    <h1 class="text-center">Reservas</h1><hr><br>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped table-borderless table-hover">
        <thead class="table" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">ID Reserva</th>
                <th class="align-middle">Nombre Cliente</th>
                <th class="align-middle">Identificacion</th>
                <th class="align-middle">Correo del Cliente</th>
                <th class="align-middle">Número de Habitación</th>
                <th class="align-middle">Huespedes adultos</th>
                <th class="align-middle">Huespedes menores</th>
                <th class="align-middle">Fecha Inicio</th>
                <th class="align-middle">Fecha Fin</th>
                <th class="align-middle">Check-in</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($reserva->id_reserva); ?></td>
                    <td><?php echo e($reserva->cliente->nombre); ?> <?php echo e($reserva->cliente->apellido); ?></td>
                    <td><?php echo e($reserva->cliente->identificacion); ?></td>
                    <td><?php echo e($reserva->cliente->correo); ?></td>
                    <td><?php echo e($reserva->habitacion->numero_habitacion); ?></td>
                    <td><?php echo e($reserva->cantidad_adultos); ?></td>
                    <td><?php echo e($reserva->cantidad_menores); ?></td>
                    <td><?php echo e($reserva->fecha_inicio); ?></td>
                    <td><?php echo e($reserva->fecha_fin); ?></td>
                    <td class="<?php if($reserva->check_in === 'CHECKED'): ?> text-success <?php elseif($reserva->check_in === 'PENDIENTE'): ?> text-danger <?php endif; ?>">
                        <?php echo e($reserva->check_in); ?>

                    </td>
                    <td><a href="<?php echo e(route('check' , ['id_reserva' => $reserva->id_reserva])); ?>" class="btn btn-success" onclick="return confirm('¿Quiere confirmar el Check-in de esta reserva?')">Check</a></td>
                    <td><a href="<?php echo e(route('editreserva', ['id_reserva' => $reserva->id_reserva])); ?>" class="btn btn-secondary">Editar</a></td>
                    <td><a href="<?php echo e(route('eliminarreserva',['id_reserva' => $reserva->id_reserva])); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar esta reserva? Tambien eliminará los datos del cliente.')">Eliminar</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <div>
        <a href="<?php echo e(route('crearreserva')); ?>" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
    </div>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/adminreservas.blade.php ENDPATH**/ ?>