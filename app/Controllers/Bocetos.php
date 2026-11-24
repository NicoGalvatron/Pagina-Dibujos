<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Bocetos extends BaseController
{
    public function index(): string
    {
        $publicacionModel = new PublicacionModel();

        $publicaciones = $publicacionModel->where('categoria_id', 3)
        ->orderBy('fecha_publicacion', 'DESC')
        ->findAll();

        // Envía los datos a tu vista app/Views/drawings/Dibujos.php
        return view('drawings/Bocetos', [
            'publicaciones' => $publicaciones
        ]);
    }
}