<?php

namespace App\Controllers;

use App\Models\PublicacionModel;
use App\Models\EtiquetaModel;

class Subir extends BaseController
{
    public function index()
    {
        // 1. Verificar que el usuario haya iniciado sesión
        $usuarioId = session()->get('id') ?? session()->get('usuario_id'); 

        if (!$usuarioId) {
            return redirect()->to(site_url('login'))->with('error', 'Debes iniciar sesión para subir imágenes.');
        }

        $texto = $this->request->getPost('texto');
        $categoria = $this->request->getPost('categoria');
        $etiquetasTexto = $this->request->getPost('etiquetas');
        $imagen = $this->request->getFile('imagen');

        // 2. AQUÍ VA EL MAPEO (reemplaza $categoriasPermitidas)
        $mapaCategorias = [
            'Dibujos'       => 1,
            'Comics'        => 2,
            'Bocetos'       => 3,
            'Ilustraciones' => 4,
        ];

        if (!array_key_exists($categoria, $mapaCategorias)) {
            return redirect()->back()->with('error', 'Categoría no válida.');
        }

        $categoriaId = $mapaCategorias[$categoria];

        if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
            // 3. Obtener metadatos ANTES de mover el archivo
            $tipoImagen  = $imagen->getClientMimeType();
            $tamanoBytes = $imagen->getSize();
            $nuevoNombre = $imagen->getRandomName();

            // 4. Mover el archivo físico a public/uploads/Categoria/
            $imagen->move(FCPATH . 'uploads/' . $categoria, $nuevoNombre);

            // 5. Guardar el registro en MySQL usando 'categoria_id'
            $publicacionModel = new PublicacionModel();
            $publicacionModel->save([
                'usuario_id'     => $usuarioId,
                'categoria_id'   => $categoriaId,
                'texto'          => $texto,
                'nombre_archivo' => $nuevoNombre,
                'tipo_imagen'    => $tipoImagen,
                'tamano_bytes'   => $tamanoBytes
            ]);

            // 6. Guardar las etiquetas asociadas a la publicación
            $publicacionId = $publicacionModel->getInsertID();
            if (!empty($etiquetasTexto)) {
                $etiquetaModel = new EtiquetaModel();
                $etiquetaModel->guardarEtiquetas($publicacionId, $etiquetasTexto);
            }

            return redirect()->to(site_url($categoria))->with('mensaje', '¡Publicación guardada con éxito!');
        }

        return redirect()->back()->with('error', 'Error al subir la imagen.');
    }
}