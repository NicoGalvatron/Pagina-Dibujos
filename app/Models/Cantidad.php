<?php
namespace App\Models;
use CodeIgniter\Model;
class PedidoModel extends Model
{
 protected $table = 'pedidos';
 protected $primaryKey = 'id';
 protected $returnType = 'array';
 protected $useTimestamps = true;
 protected $allowedFields = [
 'usuario_id', 'producto_id', 'cantidad', 'total',
 'estado', 'preference_id', 'payment_id',
 ];
}
