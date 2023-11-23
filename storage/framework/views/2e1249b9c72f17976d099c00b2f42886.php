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
    <h1 class="text-center">Administradores</h1><hr><br>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Administrador</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Identificación</th>
                <th>Identificación</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acción</th>
                <th>Acción</th>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $administradores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $administrador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($administrador->id_user); ?></td>
                    <td><?php echo e($administrador->user->nombre); ?></td>
                    <td><?php echo e($administrador->user->apellido); ?></td>
                    <td><?php echo e($administrador->user->tipo_identificacion); ?></td>
                    <td><?php echo e($administrador->user->identificacion); ?></td>
                    <td><?php echo e($administrador->user->correo); ?></td>
                    <td><?php echo e($administrador->telefono); ?></td>
                    <td><a href="<?php echo e(route('editadministrador', ['id_user' => $administrador->id_user])); ?>" class="btn btn-primary">Editar</a></td>
                    <td><a href="<?php echo e(route('eliminaradministrador', ['id_user' => $administrador->id_user])); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este administrador?')">Eliminar</a></td>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <a href="<?php echo e(route('crearadministrador')); ?>" class="btn btn-success">Agregar</a>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/adminadministradores.blade.php ENDPATH**/ ?>