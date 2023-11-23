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
    <h1 class="text-center">Editar Reserva</h1><hr><br>
    <form action="<?php echo e(route('updatereserva')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Reserva</th>
                    <th>Nombre Cliente</th>
                    <th>Apellido Cliente</th>
                    <th>Correo del Cliente</th>
                    <th>Número de Habitación</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo e($reserva->id_reserva); ?>

                        <input type="hidden" name="id_reserva" value="<?php echo e($reserva->id_reserva); ?>">
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo e($reserva->cliente->user->nombre); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="apellido" value="<?php echo e($reserva->cliente->user->apellido); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="email" name="correo" value="<?php echo e($reserva->cliente->user->correo); ?>" class="form-control">
                    </td>
                    <td>
                        <select name="numero_habitacion" class="form-control">
                            <option value="<?php echo e($reserva->numero_habitacion); ?>" selected>
                                <?php echo e($reserva->numero_habitacion); ?> (Actual)
                            </option>
                            <?php $__currentLoopData = $habitaciones_disponibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion_dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($habitacion_dis->numero_habitacion); ?>">
                                    <?php echo e($habitacion_dis->numero_habitacion); ?>

                                    <?php if($habitacion_dis->id_tipo_habitacion === 1): ?>
                                        (Normal)
                                    <?php elseif($habitacion_dis->id_tipo_habitacion === 2): ?>
                                        (Premium)
                                    <?php endif; ?>
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <input type="date" name="fecha_inicio" value="<?php echo e($reserva->fecha_inicio->format('Y-m-d')); ?>"  class="form-control">
                    </td>
                    <td>
                        <input type="date" name="fecha_fin" value="<?php echo e($reserva->fecha_fin->format('Y-m-d')); ?>"  class="form-control">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary form-control">Guardar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>


<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/editreserva.blade.php ENDPATH**/ ?>