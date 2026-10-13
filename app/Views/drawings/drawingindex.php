<?= view('templates/header') ?>

<div class="row my-5">
    <div class="col text-center">
        <?php if (!session()->get('isLoggedIn')): ?>
            <h2 class="text-muted">Aqui Puede subir sus dibujos!</h2>
            <p class="text-secondary">Hagalo por aqui!.</p>
        <?php endif; ?>
    </div>
</div>

<?= view('templates/footer') ?>