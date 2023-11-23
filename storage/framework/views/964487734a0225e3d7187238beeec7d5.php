<?php $__env->startSection('content'); ?>
<div>
    <nav>
        <a href="">Preguntas frecuentes</a>
        <a href="<?php echo e(route('home.create')); ?>">Reservas</a>
        <a href="<?php echo e(route('home.index')); ?>">Inicio</a>
    </nav>
    <header class="background">
        <h1>Hotel</h1>
        <h2>Tu bienestar es nuestra prioridad!</h2>
    </header>
    <div class="welcome_text">
        <h2>Bienvenido!</h2>
        <p>Bienvenido a nuestro hotel! Nos complace tenerles como nuestros huespedes. Disfruten de una estancia inolvidable llena de comodidad, lujo y hospitalidad. Siempre estamos aqui para hacer que su experiencia sea inigualable. ¡Bienvenidos a su hogar lejos de casa!</p>
    </div>
    <div class="reserva">
        <h4>Haz tu reserva aqui!</h4>
        <div class="boton">
            <a href="<?php echo e(route('home.create')); ?>" class="btn btn-primary custom_button" style="background-color: rgb(151, 0, 113);border-color: rgb(151, 0, 113);">Reserva aqui!</a>
        </div>
    </div>
    <br>
    <br>
    <div class="comodidad">
        <img class="foto" src="./img/comodidad_hotel.jpg" alt="foto">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla laboriosam magnam harum eos inventore saepe atque, veritatis, esse culpa a omnis, ad doloremque? Blanditiis quo nulla sapiente at ullam corporis!</p>
    </div>
    <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla laboriosam magnam harum eos inventore saepe atque, veritatis, esse culpa a omnis, ad doloremque? Blanditiis quo nulla sapiente at ullam corporis!</p>
    </div>
    <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla laboriosam magnam harum eos inventore saepe atque, veritatis, esse culpa a omnis, ad doloremque? Blanditiis quo nulla sapiente at ullam corporis!</p>
    </div>
    <br>
    <br>
</div>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Desktop\Hotel\hotel_laravel_test\resources\views/index.blade.php ENDPATH**/ ?>