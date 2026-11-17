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

<h2>Imágenes subidas</h2>

<div style="display: flex; flex-wrap: wrap; gap: 15px;">
    <?php
    $carpeta = 'uploads/';
    // Busca todas las imágenes jpg, jpeg, png, gif y webp dentro de uploads/
    $imagenes = glob($carpeta . "*.{jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP}", GLOB_BRACE);

    if (!empty($imagenes)) {
        foreach ($imagenes as $imagen) {
            echo '<div style="border: 1px solid #ccc; padding: 10px; border-radius: 8px;">';
            echo '<img src="' . htmlspecialchars($imagen) . '" alt="Imagen subida" style="width: 200px; height: auto; display: block;">';
            echo '</div>';
        }
    } else {
        echo "<p>Todavía no hay imágenes subidas.</p>";
    }
    ?>
</div>
</body>
</html>

<?= view('templates/footer') ?>
