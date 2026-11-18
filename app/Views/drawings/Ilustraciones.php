<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilustraciones</title>
    <!-- Agrega Bootstrap 5 para que funcionen tus clases y el diseño de tarjetas -->
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    
    <!-- Barra de navegación corregida y cerrada correctamente -->
    <nav class="navbar navbar-light mb-4 shadow-sm" style="background-color: #d4ac0d;">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0 text-dark fw-bold">¡Aquí puedes subir tus ilustraciones!</h1>
            <a href="<?= site_url('/') ?>" class="btn btn-dark btn-sm">Volver al inicio</a>
        </div>
    </nav>

    <div class="container mb-5">
        
        <!-- Mensajes de éxito o error al subir -->
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('mensaje') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Tarjeta con el formulario de subida -->
        <div class="card shadow-sm mb-5 border-0">
            <div class="card-body p-4">
                <h2 class="h5 mb-3 fw-bold">Nueva publicación</h2>
                <form action="<?= site_url('subir') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="categoria" value="Dibujos">

                    <div class="mb-3">
                        <label for="texto" class="form-label fw-semibold">Texto descriptivo:</label>
                        <input type="text" class="form-control" id="texto" name="texto" placeholder="Cuenta algo sobre tu ilustracion..." required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label fw-semibold">Seleccionar imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn fw-bold text-dark" style="background-color: #d4ac0d;">
                        Subir a Ilustraciones
                    </button>
                </form>
            </div>
        </div>

        <!-- Galería de imágenes subidas -->
        <h2 class="h4 mb-4 fw-bold border-bottom pb-2">Galería de Ilustraciones</h2>

        <div class="row g-4">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $pub): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <!-- Imagen ajustada uniformemente -->
                            <img src="<?= base_url('uploads/Dibujos/' . $pub['nombre_archivo']) ?>" 
                                 class="card-img-top" 
                                 alt="Dibujo" 
                                 style="height: 220px; object-fit: cover;">
                            
                            <div class="card-body d-flex flex-column">
                                <p class="card-text mb-3"><?= esc($pub['texto']) ?></p>
                                
                                <!-- Metadatos al pie de la tarjeta -->
                                <div class="mt-auto pt-2 border-top text-muted" style="font-size: 0.78rem;">
                                    <div><strong>Tipo:</strong> <?= esc($pub['tipo_imagen']) ?></div>
                                    <div><strong>Tamaño:</strong> <?= round($pub['tamano_bytes'] / 1024, 2) ?> KB</div>
                                    <div><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pub['fecha_publicacion'])) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-secondary text-center">
                        Todavía no hay Ilustraciones publicadas. ¡Sé el primero en subir uno!
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <script src="https://jsdelivr.net"></script>
</body>
</html>