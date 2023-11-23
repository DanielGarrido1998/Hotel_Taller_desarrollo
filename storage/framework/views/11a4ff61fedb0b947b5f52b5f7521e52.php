<?php $__env->startSection('content'); ?>
<div>
    <nav>
        <a href="">Preguntas frecuentes</a>
        <a href="<?php echo e(route('home.create')); ?>">Reservas</a>
        <a href="<?php echo e(route('home.index')); ?>">Inicio</a>
    </nav>
    <h3 class="res_title">Haz tu reserva ahora!</h3>

    <!--@ dump($errors)-->
    <form action="<?php echo e(route('habitaciones')); ?>" method="POST" class="formulario">
        <?php echo csrf_field(); ?>
        <div class="formulario">
            <div class="container mt-3">
                <h4 class="my-3">Formulario de reserva</h4>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">Ingrese cantidad de adultos:</label>
                        <input name="adultos" class="form-control" type="number" placeholder="maximo 2" value="<?php echo e(old('adultos')); ?>">
                        <?php $__errorArgs = ['adultos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 my-2">
                        <label for="">Ingrese cantidad de niños:</label>
                        <input name="infantes" class="form-control" type="number" placeholder="maximo 2" value="<?php echo e(old('infantes')); ?>">
                        <?php $__errorArgs = ['infantes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="">dia de entrada:</label>
                        <input name="fecha_ingreso" class="form-control" type="date" value="<?php echo e(old('fecha_ingreso')); ?>" required>
                        <?php $__errorArgs = ['fecha_ingreso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 my-2">
                        <label for="">dia de salida:</label>
                        <input name="fecha_salida" class="form-control" type="date" value="<?php echo e(old('fecha_salida')); ?>" required>
                        <?php $__errorArgs = ['fecha_salida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style=" color : red"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <br>
                <br>
                <div class="boton">
                    <button class="btn btn-primary custom_buttom" type="submit">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/formulario.blade.php ENDPATH**/ ?>