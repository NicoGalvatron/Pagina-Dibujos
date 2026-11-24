<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilustraciones</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            color: #f8f9fa;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #18191c;
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(212, 172, 13, 0.18) 0%, transparent 55%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 30px 30px;
            background-attachment: fixed;
        }
        .navbar {
            background-color: #d4ac0d;
            padding: 0.85rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 { font-size: 1.35rem; font-weight: 700; color: #212529; }
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
        .alert-success { background-color: #d1e7dd; color: #0f5132; }
        .alert-danger { background-color: #f8d7da; color: #842029; }
        .btn-close { background: none; border: none; font-size: 1.25rem; cursor: pointer; color: inherit; }
        .form-wrapper {
            max-width: 720px;
            margin: 0 auto 3rem auto;
            background-color: #22242a;
            border: 1px solid rgba(212, 172, 13, 0.35);
            border-radius: 14px;
            padding: 1.75rem;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }
        .form-wrapper h2 { font-size: 1.25rem; color: #d4ac0d; margin-bottom: 1.2rem; }
        .form-group { margin-bottom: 1.1rem; }
        .form-label { display: block; font-weight: 600; margin-bottom: 0.4rem; }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 1rem;
            background-color: #18191c;
            border: 1px solid #3c4049;
            border-radius: 8px;
            color: #f8f9fa;
        }
        .form-control:focus {
            outline: none;
            border-color: #d4ac0d;
            box-shadow: 0 0 0 3px rgba(212, 172, 13, 0.25);
        }
        .galeria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #3c4049;
            padding-bottom: 0.6rem;
            margin-bottom: 1.5rem;
        }
        .galeria-header h2 { font-size: 1.4rem; }
        .badge {
            background-color: #d4ac0d;
            color: #212529;
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
        .marco-obra {
            background-color: #22242a;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }
        .marco-obra:hover {
            transform: translateY(-6px);
            border-color: #d4ac0d;
            box-shadow: 0 14px 28px rgba(212, 172, 13, 0.2);
        }
        .paspartu { padding: 10px 10px 0 10px; background-color: #2a2d34; }
        .paspartu img { width: 100%; height: 220px; object-fit: cover; display: block; border-radius: 6px; }
        .card-body { padding: 1rem; display: flex; flex-direction: column; flex-grow: 1; }
        .card-text { margin-bottom: 1rem; }
        .card-meta {
            margin-top: auto;
            padding-top: 0.6rem;
            border-top: 1px solid #3c4049;
            color: #adb5bd;
            font-size: 0.78rem;
        }
        .card-meta strong { color: #f8f9fa; }
        .estado-vacio {
            grid-column: 1 / -1;
            background-color: rgba(34, 36, 42, 0.85);
            border: 1px dashed rgba(212, 172, 13, 0.5);
            border-radius: 14px;
            text-align: center;
            padding: 3rem 1.5rem;
        }
        .estado-vacio h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .estado-vacio p { color: #adb5bd; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>¡Aquí puedes subir tus Ilustraciones!</h1>
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

        <div class="form-wrapper">
            <h2>Nueva obra ilustrada</h2>
            <form action="<?= site_url('subir') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="categoria" value="Ilustraciones">

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
        Subir a Ilustraciones
    </button>
</form>
        </div>

        <div class="galeria-header">
            <h2>Sala de Ilustraciones</h2>
            <span class="badge"><?= count($publicaciones ?? []) ?> obras</span>
        </div>

        <div class="grid-galeria">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $pub): ?>
                    <div class="marco-obra">
                        <div class="paspartu">
                            <img src="<?= base_url('uploads/Ilustraciones/' . $pub['nombre_archivo']) ?>" alt="Ilustración">
                        </div>
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
                <div class="estado-vacio">
                    <h3>La sala de exposición está lista</h3>
                    <p>Todavía no hay ilustraciones publicadas. ¡Sé el primero en exhibir una obra!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>