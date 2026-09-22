<?= view('templates/header') ?>

<div>
    <div>
        <div>
            <h3>Registro de Usuario</h3>

            <?php if (session()->getFlashdata('errores')): ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php foreach (session()->getFlashdata('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- 1. Crear un formulario con método POST que envíe los datos a la ruta 'register' -->
            <form action="register.php" method="POST">
                <div>
                    <!-- 1.1 Insertar un campo para ingresar el nombre completo -->
                </div>
                <div>
                    <!-- 1.2 Insertar un campo para ingresar el email --> <label for="mail">Correo Electronico:</label>
                <input type="mail" id="mail" name="mail" placeholder="tu@correo.com" required>
                </div>
                <div>
                    <!-- 1.3 Insertar un campo para ingresar la contraseña --> <label for="Contraseña">Contraseña:</label>
<input type="Contraseña" id="Contraseña" name="Contraseña" placeholder="TuContraseña" required>
                </div>
                <!-- 1.3 Añadir un botón para enviar el formulario -->
            </form>
            <div>
                <!-- 2. Añadir un enlace para redirigir a 'login' si el usuario ya tiene cuenta -->
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
