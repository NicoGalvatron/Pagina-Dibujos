<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bocetos</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            color: #212529;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f3efe6;
            background-image: 
                radial-gradient(#a69f91 1px, transparent 1px),
                linear-gradient(to bottom, rgba(212, 172, 13, 0.06) 0%, rgba(166, 159, 145, 0.1) 100%);
            background-size: 20px 20px, 100% 100%;
            background-attachment: fixed;
        }
        .navbar {
            background-color: #d4ac0d;
            padding: 0.85rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 { font-size: 1.35rem; font-weight: 700; }
        .container { width: 100%; max-width: 1140px; margin: 0 auto 3rem auto; padding: 0 1rem; }
        .btn {
            display: inline-block;
            font-weight: 700;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn:hover { opacity: 0.9; }
        .btn:active { transform: scale(0.98); }
        .btn-dark { background-color: #212529; color: #ffffff; padding: 0.45rem 1rem; font-size: 0.875rem; }
        .btn-gold { background-color: #d4ac0d; color: #212529; padding: 0.65rem 1.5rem; font-size: 1rem; }
        .alert {
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
        }
        .alert-success { background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .alert-danger { background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }
        .btn-close { background: none; border: none; font-size: 1.25rem; cursor: pointer; color: inherit; }
        .hoja-boceto {
            background-color: #fffdf9;
            border: 1px solid #d5cebe;
            border-left: 6px solid #495057;
            border-radius: 4px 12px 12px 4px;
            box-shadow: 0 4px 12px rgba(50, 45, 35, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hoja-boceto:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(50, 45, 35, 0.14);
        }
        .form-wrapper { max-width: 720px; margin: 0 auto 3rem auto; padding: 1.75rem; }
        .form-wrapper h2 { font-size: 1.25rem; color: #495057; margin-bottom: 1.2rem; }
        .form-group { margin-bottom: 1.1rem; }
        .form-label { display: block; font-weight: 600; margin-bottom: 0.4rem; }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 1rem;
            background-color: #faf7f0;
            border: 1px dashed #6c757d;
            border-radius: 8px;
        }
        .form-control:focus {
            outline: none;
            background-color: #ffffff;
            border: 1px solid #d4ac0d;
            box-shadow: 0 0 0 3px rgba(212, 172, 13, 0.25);
        }
        .galeria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #c9c2b2;
            padding-bottom: 0.6rem;
            margin-bottom: 1.5rem;
        }
        .galeria-header h2 { font-size: 1.4rem; }
        .badge {
            background-color: #495057;
            color: #ffffff;
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        .grid-galeria {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }
        .card-item { display: flex; flex-direction: column; overflow: hidden; }
        .card-item img { width: 100%; height: 220px; object-fit: cover; display: block; }
        .card-body { padding: 1rem; display: flex; flex-direction: column; flex-grow: 1; }
        .card-text { margin-bottom: 1rem; font-style: italic; color: #212529; }
        .card-meta {
            margin-top: auto;
            padding-top: 0.6rem;
            border-top: 1px solid #e9e4d8;
            color: #6c757d;
            font-size: 0.78rem;
        }
        .estado-vacio {
            grid-column: 1 / -1;
            background-color: rgba(255, 253, 249, 0.9);
            border: 2px dashed #8c8577;
            border-radius: 12px;
            text-align: center;
            padding: 3rem 1.5rem;
        }
        .estado-vacio h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .estado-vacio p { color: #6c757d; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>¡Aquí puedes subir tus Bocetos!</h1>
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

        <div class="hoja-boceto form-wrapper">
            <h2>Nuevo apunte o boceto</h2>
            <form action="<?= site_url('subir') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="categoria" value="Bocetos">

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
        Subir a Bocetos
    </button>
</form>
        </div>

        <div class="galeria-header">
            <h2>Cuaderno de Bocetos</h2>
            <span class="badge"><?= count($publicaciones ?? []) ?> apuntes</span>
        </div>

        <div class="grid-galeria">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $pub): ?>
                    <div class="hoja-boceto card-item">
                        <img src="<?= base_url('uploads/Bocetos/' . $pub['nombre_archivo']) ?>" alt="Boceto">
                        <div class="card-body">
                            <p class="card-text">"<?= esc($pub['texto']) ?>"</p>
                            <div class="card-meta">
                                <div><strong>Tipo:</strong> <?= esc($pub['tipo_imagen']) ?></div>
                                <div><strong>Tamaño:</strong> <?= round($pub['tamano_bytes'] / 1024, 2) ?> KB</div>
                                <div><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pub['fecha_publicacion'])) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="estado-vacio">
                    <h3>Tu cuaderno de bocetos tiene las hojas en blanco</h3>
                    <p>Sube tu primer trazo o estudio rápido usando el formulario de arriba.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>