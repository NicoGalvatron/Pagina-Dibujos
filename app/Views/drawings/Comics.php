<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comics</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            color: #212529;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f4f1ea;
            background-image: 
                radial-gradient(#d4ac0d 1.5px, transparent 1.5px),
                radial-gradient(rgba(33, 37, 41, 0.15) 1.5px, #f4f1ea 1.5px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
            background-attachment: fixed;
        }
        .navbar {
            background-color: #d4ac0d;
            border-bottom: 4px solid #212529;
            padding: 0.85rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 { font-size: 1.35rem; font-weight: 800; text-transform: uppercase; }
        .container { width: 100%; max-width: 1140px; margin: 0 auto 3rem auto; padding: 0 1rem; }
        .btn {
            display: inline-block;
            font-weight: 700;
            text-decoration: none;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.15s ease;
        }
        .btn:active { transform: scale(0.98); }
        .btn-dark { background-color: #212529; color: #ffffff; border: none; padding: 0.45rem 1rem; font-size: 0.875rem; }
        .btn-comic {
            background-color: #d4ac0d;
            color: #212529;
            border: 2px solid #212529;
            padding: 0.65rem 1.5rem;
            font-size: 1rem;
            box-shadow: 3px 3px 0px #212529;
        }
        .btn-comic:hover { transform: translate(-1px, -1px); box-shadow: 4px 4px 0px #212529; }
        .alert {
            padding: 0.9rem 1.2rem;
            border-radius: 6px;
            border: 2px solid #212529;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }
        .alert-success { background-color: #d1e7dd; color: #0f5132; }
        .alert-danger { background-color: #f8d7da; color: #842029; }
        .btn-close { background: none; border: none; font-size: 1.3rem; cursor: pointer; color: inherit; }
        .vineta-comic {
            background-color: #ffffff;
            border: 3px solid #212529;
            border-radius: 6px;
            box-shadow: 6px 6px 0px #212529;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .vineta-comic:hover {
            transform: translate(-2px, -2px);
            box-shadow: 9px 9px 0px #d4ac0d;
        }
        .form-wrapper { max-width: 720px; margin: 0 auto 3rem auto; padding: 1.75rem; }
        .cartel-narracion {
            background-color: #fff9db;
            border: 2px solid #212529;
            box-shadow: 3px 3px 0px #212529;
            display: inline-block;
            padding: 5px 14px;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }
        .form-group { margin-bottom: 1.1rem; }
        .form-label { display: block; font-weight: 700; margin-bottom: 0.4rem; }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 1rem;
            border: 2px solid #212529;
            border-radius: 6px;
            background-color: #ffffff;
        }
        .form-control:focus { outline: none; box-shadow: 3px 3px 0px #d4ac0d; }
        .galeria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .galeria-header .cartel-narracion { margin-bottom: 0; font-size: 1.1rem; }
        .badge {
            background-color: #212529;
            color: #ffc107;
            border: 2px solid #212529;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 700;
        }
        .grid-galeria {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.75rem;
        }
        .card-item { display: flex; flex-direction: column; overflow: hidden; }
        .card-item img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            border-bottom: 3px solid #212529;
        }
        .card-body { padding: 1rem; display: flex; flex-direction: column; flex-grow: 1; }
        .card-text { margin-bottom: 1rem; font-weight: 600; }
        .card-meta {
            margin-top: auto;
            padding-top: 0.6rem;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 0.78rem;
        }
        .estado-vacio { grid-column: 1 / -1; text-align: center; padding: 3rem 1.5rem; }
        .estado-vacio h3 { font-size: 1.2rem; text-transform: uppercase; margin-bottom: 0.5rem; }
        .estado-vacio p { color: #6c757d; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>¡Aquí puedes subir tus Comics!</h1>
        <a href="<?= site_url('/') ?>" class="btn btn-dark">Volver al inicio</a>
    </nav>

    <div class="container">
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success" role="alert">
                <span><?= session()->getFlashdata('mensaje') ?></span>
                <button type="button" class="btn-close" onclick="this.parentElement.remove()">&times;</button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <span><?= session()->getFlashdata('error') ?></span>
                <button type="button" class="btn-close" onclick="this.parentElement.remove()">&times;</button>
            </div>
        <?php endif; ?>

        <div class="vineta-comic form-wrapper">
            <div class="cartel-narracion">Nueva entrega de Cómic</div>
            <form action="<?= site_url('subir') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="categoria" value="Comics">

                <div class="form-group">
        <label for="texto" class="form-label">Texto descriptivo:</label>
        <input type="text" class="form-control" id="texto" name="texto" placeholder="Cuenta algo sobre tu dibujo..." required>
    </div>

    <!-- AQUÍ VA EL BLOQUE DE ETIQUETAS -->
    <div class="form-group">
        <label for="etiquetas" class="form-label">Etiquetas (separadas por coma):</label>
        <input type="text" class="form-control" id="etiquetas" name="etiquetas" placeholder="Ej: anime, boceto, personaje, digital">
    </div>

    <div class="form-group">
        <label for="imagen" class="form-label">Seleccionar imagen:</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-gold">
        Subir a Comics
    </button>
</form>
        </div>

        <div class="galeria-header">
            <h2 class="cartel-narracion">Galería de Comics</h2>
            <span class="badge"><?= count($publicaciones ?? []) ?> entregas</span>
        </div>

        <div class="grid-galeria">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $pub): ?>
                    <div class="vineta-comic card-item">
                        <img src="<?= base_url('uploads/Comics/' . $pub['nombre_archivo']) ?>" alt="Comic">
                        <div class="card-body">
                            <p class="card-text"><?= esc($pub['texto']) ?></p>
                            <div class="card-meta">
                                <div><strong>Tipo:</strong> <?= esc($pub['tipo_imagen']) ?></div>
                                <div><strong>Tamaño:</strong> <?= round($pub['tamano_bytes'] / 1024, 2) ?> KB</div>
                                <div><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pub['fecha_publicacion'])) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="vineta-comic estado-vacio">
                    <h3>¡Esta página está en blanco!</h3>
                    <p>Todavía no hay Comics publicados. ¡Sube la primera viñeta arriba!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>