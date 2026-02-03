<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKriteria extends Migration
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
                'constraint' => 50,
                'null'       => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => true,
            ],
            'bobot' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['Benefits', 'Cost'],
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kriteria', true);
    }

    public function down()
    {
        $this->forge->dropTable('kriteria', true);
    }
}
