<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPredeterminado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prederterminado'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_subcategoria'       => [
                'type'       => 'INT',
                'constraint' => 150,
            ],
           
            'descripcion'       => [
                'type'       => 'Varchar',
                'constraint' => 300,
            ],
        ]);
        $this->forge->addKey('id_prederterminado', true);
        $this->forge->createTable('tb_prederterminado');
    }

    public function down()
    {
        $this->forge->dropTable('tb_predeterminado');
    }
}
