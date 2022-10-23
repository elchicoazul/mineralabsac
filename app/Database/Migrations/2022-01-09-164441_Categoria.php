<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categoria'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre'       => [
                'type'       => 'Varchar',
                'constraint' => 150,
            ],
           
            'tipo'       => [
                'type'       => 'Varchar',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id_categoria', true);
        $this->forge->createTable('tb_categoria');
    }

    public function down()
    {
        $this->forge->dropTable('tb_categoria');
    }
}
