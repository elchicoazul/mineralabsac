<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Programados extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_programado'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_cliente'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'id_categoria'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'movimiento'       => [
                'type'       => 'Varchar',
                'constraint' => 150,
            ],
            'montos'       => [
                'type'       => 'Double',
                'constraint' =>[40, 2],
                'null'           => true,
            ],
            'montod'       => [
                'type'       => 'Double',
                'constraint' =>[40, 2],
                'null'           => true,
            ],
            'descripcion'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addKey('id_programado', true);
        $this->forge->createTable('tb_programados');
    }

    public function down()
    {
        $this->forge->dropTable('tb_programados');
    }
}
