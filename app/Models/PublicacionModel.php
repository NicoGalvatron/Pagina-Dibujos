<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $table      = 'publicaciones';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuario_id',
        'categoria_id', // <-- Antes decía 'categoria'
        'texto',
        'nombre_archivo',
        'tipo_imagen',
        'tamano_bytes',
        'fecha_publicacion'
    ];
}