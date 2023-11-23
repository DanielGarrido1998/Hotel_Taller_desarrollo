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
    <h1 class="text-center">Crear Habitación</h1><hr><br>
    <form action="<?php echo e(route('ingresarhabitacion')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Número de Habitación</th>
                    <th>Tipo de Habitación</th>
                    <th>Descripción</th>
                    <th>Capacidad</th>
                    <th>Precio por Noche</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="number" name="numero_habitacion"  class="form-control">
                    </td>
                    <td>
                        <select name="tipo" class="form-control">
                            <option>Premium</option>
                            <option>Normal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="descripcion" class="form-control">
                    </td>
                    <td>
                        <input type="number" name="capacidad"  class="form-control">
                    </td>
                    <td>
                        <input type="number" name="precio_por_noche"  class="form-control">
                    </td>
                    <td>
                        <select name="estado" class="form-control">
                            <option>Libre</option>
                            <option>Ocupada</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php echo $__env->make('layouts.adminbase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/crearhabitacion.blade.php ENDPATH**/ ?>