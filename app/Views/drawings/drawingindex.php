<?= view('templates/header') ?>

<div class="row my-5">
    <div class="col text-center">
        <?php if (!session()->get('isLoggedIn')): ?>
        <?php endif; ?>
    </div>
</div>
<!DOCTYPE html>
<html>
<head>
    <style>
        .btn-categoria {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }
        .btn-categoria:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <meta charset="UTF-8">
    <title>Categorías</title>
   

    <h2>Selecciona una categoría</h2>

    <!-- 4 botones apuntando al mismo archivo con distinto parámetro -->
    <a href="<?= base_url('Dibujos') ?>" class="btn-categoria">Dibujos</a>
<a href="<?= base_url('Ilustraciones') ?>" class="btn-categoria">Ilustraciones</a>
<a href="<?= base_url('Bocetos') ?>" class="btn-categoria">Bocetos</a>
<a href="<?= base_url('Comics') ?>" class="btn-categoria">Comics</a>

</body>
</html>

<?= view('templates/footer') ?>
