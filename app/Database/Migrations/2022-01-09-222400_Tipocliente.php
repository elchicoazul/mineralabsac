<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tipocliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tipocliente'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre'       => [
                'type'       => 'Varchar',
                'constraint' => 150,
            ],
           
            'descripcion'       => [
                'type'       => 'Varchar',
                'constraint' => 150,
            ],
        ]);
        $this->forge->addKey('id_tipocliente', true);
        $this->forge->createTable('tb_tipocliente');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tipocliente');
    }
}
