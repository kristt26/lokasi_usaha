<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePreferensi extends Migration
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
            'lokasi_id' => [
                'type' => 'INT',
            ],
            'value' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
            'bobot' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('kriteria_id');
        $this->forge->addKey('lokasi_id');

        $this->forge->addForeignKey(
            'kriteria_id',
            'kriteria',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->forge->addForeignKey(
            'lokasi_id',
            'lokasi',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->forge->createTable('preferensi', true);
    }

    public function down()
    {
        $this->forge->dropTable('preferensi', true);
    }
}
