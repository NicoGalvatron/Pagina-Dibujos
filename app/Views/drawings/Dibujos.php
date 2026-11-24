<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dibujos</title>
    
    <style>
        /* Reset y tipografía nativa (carga instantánea sin internet) */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            color: #212529;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f6f0;
            background-image: 
                radial-gradient(circle at 10% 15%, rgba(212, 172, 13, 0.14) 0%, transparent 40%),
                radial-gradient(circle at 90% 85%, rgba(212, 172, 13, 0.12) 0%, transparent 45%),
                linear-gradient(to right, rgba(33, 37, 41, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(33, 37, 41, 0.05) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px, 26px 26px;
        }

        /* Barra de navegación */
        .navbar {
            background-color: #d4ac0d;
            padding: 0.85rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: #212529;
        }

        /* Contenedor principal */
        .container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto 3rem auto;
            padding: 0 1rem;
        }

        /* Botones */
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
        .btn-dark {
            background-color: #212529;
            color: #ffffff;
            padding: 0.45rem 1rem;
            font-size: 0.875rem;
        }
        .btn-gold {
            background-color: #d4ac0d;
            color: #212529;
            padding: 0.65rem 1.5rem;
            font-size: 1rem;
        }

        /* Alertas */
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
        .btn-close {
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            color: inherit;
            line-height: 1;
        }

        /* Formulario de subida */
        .form-wrapper {
            max-width: 720px;
            margin: 0 auto 3rem auto;
            background-color: #ffffff;
            border-radius: 15px;
            border-top: 5px solid #d4ac0d;
            padding: 1.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }
        .form-wrapper h2 {
            font-size: 1.25rem;
            margin-bottom: 1.2rem;
        }
        .form-group { margin-bottom: 1.1rem; }
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.4rem;
        }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.85rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: #ffffff;
        }
        .form-control:focus {
            outline: none;
            border-color: #d4ac0d;
            box-shadow: 0 0 0 3px rgba(212, 172, 13, 0.25);
        }

        /* Encabezado de galería */
        .galeria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ced4da;
            padding-bottom: 0.6rem;
            margin-bottom: 1.5rem;
        }
        .galeria-header h2 { font-size: 1.4rem; }
        .badge {
            background-color: #212529;
            color: #ffc107;
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        /* Cuadrícula responsiva */
        .grid-galeria {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        /* Tarjetas de dibujos */
        .card-dibujo {
            background-color: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-dibujo:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }
        .card-dibujo img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        .card-body {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .card-text {
            margin-bottom: 1rem;
            font-weight: 500;
        }
        .card-meta {
            margin-top: auto;
            padding-top: 0.6rem;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 0.78rem;
        }

        /* Estado vacío */
        .estado-vacio {
            grid-column: 1 / -1;
            background-color: rgba(255, 255, 255, 0.88);
            border: 2px dashed #d4ac0d;
            border-radius: 16px;
            text-align: center;
            padding: 3rem 1.5rem;
        }
        .estado-vacio h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .estado-vacio p { color: #6c757d; }
    </style>
</head>
<body>
    
    <!-- Barra de navegación -->
    <nav class="navbar">
        <h1>¡Aquí puedes subir tus Dibujos!</h1>
        <a href="<?= site_url('/') ?>" class="btn btn-dark">Volver al inicio</a>
    </nav>

    <div class="container">
        
        <!-- Mensajes de éxito o error al subir -->
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

        <!-- Tarjeta con el formulario de subida -->
        <div class="form-wrapper">
            <h2>Nueva publicación</h2>
            <form action="<?= site_url('subir') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="categoria" value="Dibujos">

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
        Subir a Dibujos
    </button>
</form>
        </div>

        <!-- Galería de imágenes subidas -->
        <div class="galeria-header">
            <h2>Galería de Dibujos</h2>
            <span class="badge"><?= count($publicaciones ?? []) ?> publicaciones</span>
        </div>

        <div class="grid-galeria">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $pub): ?>
                    <div class="card-dibujo">
                        <img src="<?= base_url('uploads/Dibujos/' . $pub['nombre_archivo']) ?>" alt="Dibujo">
                        
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
                    <h3>Tu galería aún está esperando su primera obra</h3>
                    <p>Completa el formulario de arriba para publicar tu primer dibujo.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>