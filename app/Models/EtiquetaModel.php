<?php

namespace App\Models;

use CodeIgniter\Model;

class EtiquetaModel extends Model
{
    protected $table         = 'etiquetas';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nombre'];

    // Procesa un texto separado por comas y lo asocia a una publicación
    public function guardarEtiquetas($publicacionId, string $textoEtiquetas)
    {
        $db = \Config\Database::connect();
        $builderPuente = $db->table('publicacion_etiquetas');

        // Separa por comas, limpia espacios, símbolos # y pasa a minúsculas
        $lista = explode(',', $textoEtiquetas);

        foreach ($lista as $item) {
            $nombre = strtolower(trim(str_replace('#', '', $item)));
            if ($nombre === '') continue;

            // Busca si la etiqueta ya existe; si no, la crea
            $etiqueta = $this->where('nombre', $nombre)->first();
            $etiquetaId = $etiqueta ? $etiqueta['id'] : $this->insert(['nombre' => $nombre]);

            // Vincula en la tabla puente (ignora si ya estaba vinculada)
            $builderPuente->ignore(true)->insert([
                'publicacion_id' => $publicacionId,
                'etiqueta_id'    => $etiquetaId
            ]);
        }
    }

    // Obtiene todas las etiquetas de una publicación
    public function obtenerPorPublicacion($publicacionId)
    {
        return $this->select('etiquetas.*')
                    ->join('publicacion_etiquetas', 'publicacion_etiquetas.etiqueta_id = etiquetas.id')
                    ->where('publicacion_etiquetas.publicacion_id', $publicacionId)
                    ->findAll();
    }
}