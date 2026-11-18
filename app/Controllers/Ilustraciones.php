<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Dibujos extends BaseController
{
    public function index(): string
    {
        $publicacionModel = new PublicacionModel();

        // Busca todas las publicaciones de la categoría 'Dibujos'
        $publicaciones = $publicacionModel->where('categoria', 'Ilustraciones')
                                          ->orderBy('fecha_publicacion', 'DESC')
                                          ->findAll();

        // Envía los datos a tu vista app/Views/drawings/Dibujos.php
        return view('drawings/Ilustraciones', [
            'publicaciones' => $publicaciones
        ]);
    }
}