<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(to right, rgb(150, 0, 112), rgb(255, 86, 213)); color:rgb(255, 255, 255); text-align: center;">
                        Iniciar Sesión
                    </div>
                    <div class="card-body text-center">
                        <form action="<?php echo e(route('admin')); ?>" method="POST">
                            <!-- Agrega el token CSRF si estás utilizando Laravel -->
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="nombre_usuario" class="form-label">Correo:</label>
                                <input type="text" class="form-control" name="correo" required>
                            </div>

                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control"name="password" required>
                            </div>

                            <button type="submit" style="background-color: rgb(150, 0, 112); border-color:rgb(150, 0, 112)" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php /**PATH C:\Users\Daniel\Desktop\hotel_laravel_test\resources\views/login.blade.php ENDPATH**/ ?>