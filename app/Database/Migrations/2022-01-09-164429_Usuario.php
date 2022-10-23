<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario'       => [
                'type'       => 'Varchar',
                'constraint' => 10,
            ],
            'password'       => [
                'type'       => 'Varchar',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addKey('id_usuario', true);
        $this->forge->createTable('tb_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('tb_usuario');
    }
}
