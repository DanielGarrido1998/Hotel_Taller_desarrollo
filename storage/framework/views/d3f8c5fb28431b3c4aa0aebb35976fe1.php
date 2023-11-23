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
    <h1 class="text-center">Editar Administrador</h1><hr><br>
    <form action="<?php echo e(route('updateadministrador')); ?>" method="POST">
        <?php echo csrf_field(); ?>
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
                    <th>Contraseña</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo e($administrador->id_user); ?>

                        <input type="hidden" name="id_user" value="<?php echo e($administrador->id_user); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo e($administrador->user->nombre); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="apellido" value="<?php echo e($administrador->user->apellido); ?>" class="form-control">
                    </td>
                    <td>
                        <select name="tipo_identificacion" class="form-control">
                            <option value="RUT" <?php if($administrador->user->tipo_identificacion === 'RUT'): ?> selected <?php endif; ?>>RUT</option>
                            <option value="PASAPORTE" <?php if($administrador->user->tipo_identificacion === 'Pasaporte'): ?> selected <?php endif; ?>>PASAPORTE</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="identificacion" value="<?php echo e($administrador->user->identificacion); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="email" name="correo" value="<?php echo e($administrador->user->correo); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="telefono" value="<?php echo e($administrador->telefono); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="password" value="<?php echo e($administrador->contraseña); ?>" class="form-control">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary form-control">Guardar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/editadministrador.blade.php ENDPATH**/ ?>