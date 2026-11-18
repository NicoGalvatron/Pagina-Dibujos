<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Subir extends BaseController
{
    public function index()
    {
        // 1. Verificar que el usuario haya iniciado sesión (ajusta 'usuario_id' al nombre de tu variable de sesión)
        $usuarioId = session()->get('usuario_id'); 
        if (!$usuarioId) {
            return redirect()->to(site_url('login'))->with('error', 'Debes iniciar sesión para subir imágenes.');
        }

        $texto = $this->request->getPost('texto');
        $categoria = $this->request->getPost('categoria');
        $imagen = $this->request->getFile('imagen');

        $categoriasPermitidas = ['Dibujos', 'Ilustraciones', 'Bocetos', 'Comics'];
        if (!in_array($categoria, $categoriasPermitidas)) {
            return redirect()->back()->with('error', 'Categoría no válida.');
        }

        if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
            // 2. Obtener metadatos ANTES de mover el archivo
            $tipoImagen  = $imagen->getClientMimeType(); // Ej: image/jpeg, image/png
            $tamanoBytes = $imagen->getSize();           // Tamaño en bytes
            $nuevoNombre = $imagen->getRandomName();

            // 3. Mover el archivo físico a public/uploads/Categoria/
            $imagen->move(FCPATH . 'uploads/' . $categoria, $nuevoNombre);

            // 4. Guardar el registro en MySQL
            $publicacionModel = new PublicacionModel();
            $publicacionModel->save([
                'usuario_id'     => $usuarioId,
                'categoria'      => $categoria,
                'texto'          => $texto,
                'nombre_archivo' => $nuevoNombre,
                'tipo_imagen'    => $tipoImagen,
                'tamano_bytes'   => $tamanoBytes
                // fecha_publicacion se llena automáticamente en MySQL
            ]);

            return redirect()->to(site_url($categoria))->with('mensaje', '¡Publicación guardada con éxito!');
        }

        return redirect()->back()->with('error', 'Error al subir la imagen.');
    }
}