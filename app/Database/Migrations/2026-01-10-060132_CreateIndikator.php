<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIndikator extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kriteria_id' => [
                'type' => 'INT',
            ],
            'indikator' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'bobot' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('kriteria_id');
        $this->forge->addForeignKey(
            'kriteria_id',
            'kriteria',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->forge->createTable('indikator', true);
    }

    public function down()
    {
        $this->forge->dropTable('indikator', true);
    }
}
