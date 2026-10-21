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

            <!-- 1. Formulario POST que envía los datos a la ruta 'register' -->
            <form action="<?= base_url('register') ?>" method="POST">
                <div>
                    <!-- CORREGIDO: type="text" y name="name" -->
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" placeholder="tunombre" value="<?= old('name') ?>" required>
                </div>
                <div>
                    <!-- CORREGIDO: type="email" y name="email" -->
                    <label for="email">Correo Electronico:</label>
                    <input type="email" id="email" name="email" placeholder="tu@correo.com" value="<?= old('email') ?>" required>
                </div>
                <div>
                    <!-- CORREGIDO: type="password" y name="password" -->
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="TuContraseña" required>
                </div>
                <!-- 1.3 Botón para enviar el formulario --> 
                <button type="submit">Enviar</button>
            </form>
            <div>
                <!-- 2. Enlace para redirigir a 'login' --> 
                <p>Ya tienes cuenta? <a href="<?= site_url('login') ?>">Ingresa aqui</a></p>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
