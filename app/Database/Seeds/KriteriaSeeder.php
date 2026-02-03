<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kode' => 'C1', 'nama' => 'Tingkat Kepadatan Penduduk', 'bobot' => 25, 'type' => 'Benefits'],
            ['kode' => 'C2', 'nama' => 'Kemudahan Akses',          'bobot' => 20, 'type' => 'Cost'],
            ['kode' => 'C3', 'nama' => 'Biaya Sewa',               'bobot' => 20, 'type' => 'Cost'],
            ['kode' => 'C4', 'nama' => 'Potensi Pasar',            'bobot' => 25, 'type' => 'Benefits'],
            ['kode' => 'C5', 'nama' => 'Tingkat Persaingan Usaha', 'bobot' => 10, 'type' => 'Cost'],
        ];

        $this->db->table('kriteria')->insertBatch($data);
    }
}
