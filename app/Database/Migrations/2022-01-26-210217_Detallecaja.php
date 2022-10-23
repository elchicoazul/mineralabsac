<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detallecaja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detalle'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_programado'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                
                
            ],
            'id_caja'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'id_cliente'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'id_pronuevo'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            
            'detalle'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addKey('id_detalle', true);
        $this->forge->createTable('tb_detalle');
    }

    public function down()
    {
        $this->forge->dropTable('tb_detalle');
    }
}
