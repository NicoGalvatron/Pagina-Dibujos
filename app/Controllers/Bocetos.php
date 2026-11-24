<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Bocetos extends BaseController
{
    public function index(): string
    {
        $publicacionModel = new PublicacionModel();

        // Busca todas las publicaciones de la categoría 'Dibujos'
        $publicaciones = $publicacionModel->where('categoria_id', 1)
        ->orderBy('fecha_publicacion', 'DESC')
        ->findAll();

        // Envía los datos a tu vista app/Views/drawings/Dibujos.php
        return view('drawings/Bocetos', [
            'publicaciones' => $publicaciones
        ]);
    }
}