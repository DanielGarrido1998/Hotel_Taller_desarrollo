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
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>"  style="color:rgb(161, 0, 121); font-weight: bold;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Empleados</h1><hr><br>
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
        <thead class="table" style="background:linear-gradient(to left, rgb(182, 0, 136), rgb(122, 0, 92)); color: white;">
            <tr>
                <th class="align-middle">ID Administrador</th>
                <th class="align-middle">Nombre</th>
                <th class="align-middle">Apellidos</th>
                <th class="align-middle">Tipo Identificación</th>
                <th class="align-middle">Identificación</th>
                <th class="align-middle">Correo</th>
                <th class="align-middle">Nombre Usuario</th>
                <th class="align-middle">Telefono</th>
                <th class="align-middle">Acción</th>
                <th class="align-middle">Acción</th>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody class="table-bordered">
            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($empleado->id_empleado); ?></td>
                    <td><?php echo e($empleado->nombre); ?></td>
                    <td><?php echo e($empleado->apepat); ?>  <?php echo e($empleado->apemat); ?></td>
                    <td><?php echo e($empleado->tipo_identificacion); ?></td>
                    <td><?php echo e($empleado->identificacion); ?></td>
                    <td><?php echo e($empleado->empleadoUsuario->usuario->correo); ?></td>
                    <td><?php echo e($empleado->empleadoUsuario->usuario->username); ?></td>
                    <td><?php echo e($empleado->telefono); ?></td>
                    <td><a href="<?php echo e(route('editadministrador', ['id_empleado' => $empleado->id_empleado])); ?>" class="btn btn-secondary">Editar</a></td>
                    <td><a href="<?php echo e(route('eliminaradministrador', ['id_empleado' => $empleado->id_empleado])); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este administrador?')">Eliminar</a></td>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr>
    <a href="<?php echo e(route('crearadministrador')); ?>" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113)" class="btn btn-success">Agregar</a>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/adminadministradores.blade.php ENDPATH**/ ?>