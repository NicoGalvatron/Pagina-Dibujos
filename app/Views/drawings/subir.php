<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoger el texto
    $texto = htmlspecialchars($_POST['texto']);

    // 2. Procesar la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = basename($_FILES['imagen']['name']);
        
        // Carpeta de destino (asegúrate de que exista y tenga permisos de escritura)
        $carpetaDestino = 'uploads/';
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0755, true);
        }

        $rutaFinal = $carpetaDestino . time() . '_' . $nombreArchivo;

        // Mover el archivo del directorio temporal a la carpeta definitiva
        if (move_uploaded_file($archivoTmp, $rutaFinal)) {
            echo "<h3>Imagen subida con éxito</h3>";
            echo "<p><strong>Texto recibido:</strong> " . $texto . "</p>";
            echo "<img src='" . $rutaFinal . "' width='200'>";
        } else {
            echo "Error al mover la imagen al servidor.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen válida.";
    }
}