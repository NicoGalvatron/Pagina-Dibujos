<?= view('templates/header') ?>

<div class="d-flex flex-column justify-content-center align-items-center text-center px-3" style="min-height: 70vh;">
    <?php if (session()->get('isLoggedIn')): ?>
        <h1 class="display-4 fw-bold text-dark mb-3" style="text-shadow: 0 2px 10px rgba(255, 255, 255, 0.9);">
            ¡Bienvenido, <span style="color: #b7950b;"><?= esc(session()->get('name')) ?></span>!
        </h1>
        <p class="lead text-secondary fw-medium mb-4" style="max-width: 550px;">
            Explorá tus creaciones o subí nuevos dibujos, cómics e ilustraciones a tu galería.
        </p>
        <a href="<?= site_url('drawingindex') ?>" class="btn btn-dark btn-lg px-4 shadow-sm">
            Ir a mis dibujos
        </a>
    <?php else: ?>
        <h1 class="display-4 fw-bold text-dark mb-3" style="text-shadow: 0 2px 10px rgba(255, 255, 255, 0.9);">
            ¡Bienvenido a Mi Página de Dibujos!
        </h1>
        <p class="lead text-secondary fw-medium mb-4" style="max-width: 550px;">
            Iniciá sesión o registrate desde el menú superior para comenzar.
        </p>
        <div>
            <a href="<?= site_url('login') ?>" class="btn btn-dark btn-lg px-4 me-2 shadow-sm">Ingresar</a>
            <a href="<?= site_url('register') ?>" class="btn btn-outline-dark btn-lg px-4">Registrarse</a>
        </div>
    <?php endif; ?>
</div>

<?= view('templates/footer') ?>