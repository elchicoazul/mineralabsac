<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cliente'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre'       => [
                'type'       => 'Varchar',
                'constraint' => 150,
            ],
            'dni'       => [
                'type'       => 'Varchar',
                'constraint' => 20,
            ], 
            'direccion'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
            'rol'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
            'descripcion'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addKey('id_cliente', true);
        $this->forge->createTable('tb_cliente');
    }

    public function down()
    {
        $this->forge->dropTable('tb_cliente');
    }
}
