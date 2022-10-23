<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subacategoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_subcategoria'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_categoria'       => [
                'type'       => 'INT',
                'constraint' => 10,
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
        $this->forge->addKey('id_subcategoria', true);
        $this->forge->createTable('tb_subcategoria');
    }

    public function down()
    {
        $this->forge->dropTable('tb_subcategoria');
    }
}
