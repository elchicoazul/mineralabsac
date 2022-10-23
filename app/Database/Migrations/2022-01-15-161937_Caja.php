<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Caja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_caja'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_cliente'          => [
                'type'           => 'INT',
                'constraint'     => 10,
              
            ],
            'id_categoria'          => [
                'type'           => 'INT',
                'constraint'     => 10,
              
            ],
            'comprobante'       => [
                'type'       => 'Varchar',
                'constraint' => 10,
            ],
            'numero'       => [
                'type'       => 'Varchar',
                'constraint' => 10,
            ],
            'fecha'       => [
                'type'       => 'Date',
                
            ],
            'importes'       => [
                'type'       => 'Double',
                'constraint' =>[40, 2],
                
            ],
            'imported'       => [
                'type'       => 'Double',
                'constraint' =>[40, 2],
                
            ],
            'metodo'       => [
                'type'       => 'Varchar',
                'constraint' =>200,
                
            ],
            'descripcion'       => [
                'type'       => 'Varchar',
                'constraint' => 500,
            ],
        ]);
        $this->forge->addKey('id_caja', true);
        $this->forge->createTable('tb_caja');
    }

    public function down()
    {
        $this->forge->dropTable('tb_caja');
    }
}
