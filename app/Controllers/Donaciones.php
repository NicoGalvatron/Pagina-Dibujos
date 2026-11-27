<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateDonaciones extends Migration
{
 public function up()
 {
 $this->forge->addField([
 'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
 'usuario_id' => ['type' => 'INT', 'unsigned' => true],
 'producto_id' => ['type' => 'INT', 'unsigned' => true],
 'cantidad' => ['type' => 'INT', 'unsigned' => true, 'default' => 1],
 'total' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
 'estado' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'creado'],
 'preference_id' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
 'payment_id' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
 'created_at' => ['type' => 'DATETIME', 'null' => true],
 'updated_at' => ['type' => 'DATETIME', 'null' => true],
 ]);
 $this->forge->addKey('id', true);
 $this->forge->addForeignKey('usuario_id', 'usuarios', 'id');
 $this->forge->addForeignKey('producto_id', 'productos', 'id');
 $this->forge->createTable('pedidos');
 }
 public function down()
 {
 $this->forge->dropTable('pedidos');
 }
}
