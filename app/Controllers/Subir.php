<?php

namespace App\Controllers;

class Subir extends BaseController
{
    public function index()
    {
        // 1. Recoger el texto enviado desde el formulario
        $texto = $this->request->getPost('texto');

        // 2. Recoger el archivo de imagen
        $imagen = $this->request->getFile('imagen');

        // 3. Validar que la imagen sea válida y no se haya movido aún
        if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
            // Genera un nombre aleatorio seguro y guarda la imagen en public/uploads/
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move(FCPATH . 'uploads', $nuevoNombre);

            return "<h3>Imagen subida con éxito</h3>
                    <p><strong>Texto:</strong> " . esc($texto) . "</p>
                    <img src='" . base_url('uploads/' . $nuevoNombre) . "' width='200'>";
        }

        return "Error al subir la imagen: " . ($imagen ? $imagen->getErrorString() : 'Archivo no encontrado');
    }
}