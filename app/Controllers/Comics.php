<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Comics extends BaseController
{
    public function index(): string
    {
        $publicacionModel = new PublicacionModel();

        $publicaciones = $publicacionModel->where('categoria_id', 2)
        ->orderBy('fecha_publicacion', 'DESC')
        ->findAll();

        return view('drawings/Comics', [
            'publicaciones' => $publicaciones
        ]);
    }
}