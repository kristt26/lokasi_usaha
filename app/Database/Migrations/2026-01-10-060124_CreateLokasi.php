<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLokasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => true,
            ],
            'desc' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('lokasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('lokasi', true);
    }
}
