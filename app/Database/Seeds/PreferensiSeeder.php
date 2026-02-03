<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PreferensiSeeder extends Seeder
{
    public function run()
    {
        $data = [

            // A1
            ['lokasi_id'=>1,  'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>1,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>1,  'kriteria_id'=>3, 'bobot'=>1],
            ['lokasi_id'=>1,  'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>1,  'kriteria_id'=>5, 'bobot'=>3],

            // A2
            ['lokasi_id'=>2,  'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>2,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>2,  'kriteria_id'=>3, 'bobot'=>2],
            ['lokasi_id'=>2,  'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>2,  'kriteria_id'=>5, 'bobot'=>2],

            // A3
            ['lokasi_id'=>3,  'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>3,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>3,  'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>3,  'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>3,  'kriteria_id'=>5, 'bobot'=>4],

            // A4
            ['lokasi_id'=>4,  'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>4,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>4,  'kriteria_id'=>3, 'bobot'=>2],
            ['lokasi_id'=>4,  'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>4,  'kriteria_id'=>5, 'bobot'=>2],

            // A5
            ['lokasi_id'=>5,  'kriteria_id'=>1, 'bobot'=>3],
            ['lokasi_id'=>5,  'kriteria_id'=>2, 'bobot'=>2],
            ['lokasi_id'=>5,  'kriteria_id'=>3, 'bobot'=>4],
            ['lokasi_id'=>5,  'kriteria_id'=>4, 'bobot'=>2],
            ['lokasi_id'=>5,  'kriteria_id'=>5, 'bobot'=>4],

            // A6
            ['lokasi_id'=>6,  'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>6,  'kriteria_id'=>2, 'bobot'=>3],
            ['lokasi_id'=>6,  'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>6,  'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>6,  'kriteria_id'=>5, 'bobot'=>2],

            // A7
            ['lokasi_id'=>7,  'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>7,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>7,  'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>7,  'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>7,  'kriteria_id'=>5, 'bobot'=>3],

            // A8
            ['lokasi_id'=>8,  'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>8,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>8,  'kriteria_id'=>3, 'bobot'=>2],
            ['lokasi_id'=>8,  'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>8,  'kriteria_id'=>5, 'bobot'=>1],

            // A9
            ['lokasi_id'=>9,  'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>9,  'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>9,  'kriteria_id'=>3, 'bobot'=>2],
            ['lokasi_id'=>9,  'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>9,  'kriteria_id'=>5, 'bobot'=>2],

            // A10
            ['lokasi_id'=>10, 'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>10, 'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>10, 'kriteria_id'=>3, 'bobot'=>1],
            ['lokasi_id'=>10, 'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>10, 'kriteria_id'=>5, 'bobot'=>2],

            // A11
            ['lokasi_id'=>11, 'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>11, 'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>11, 'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>11, 'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>11, 'kriteria_id'=>5, 'bobot'=>3],

            // A12
            ['lokasi_id'=>12, 'kriteria_id'=>1, 'bobot'=>5],
            ['lokasi_id'=>12, 'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>12, 'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>12, 'kriteria_id'=>4, 'bobot'=>4],
            ['lokasi_id'=>12, 'kriteria_id'=>5, 'bobot'=>2],

            // A13
            ['lokasi_id'=>13, 'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>13, 'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>13, 'kriteria_id'=>3, 'bobot'=>4],
            ['lokasi_id'=>13, 'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>13, 'kriteria_id'=>5, 'bobot'=>4],

            // A14
            ['lokasi_id'=>14, 'kriteria_id'=>1, 'bobot'=>4],
            ['lokasi_id'=>14, 'kriteria_id'=>2, 'bobot'=>4],
            ['lokasi_id'=>14, 'kriteria_id'=>3, 'bobot'=>3],
            ['lokasi_id'=>14, 'kriteria_id'=>4, 'bobot'=>3],
            ['lokasi_id'=>14, 'kriteria_id'=>5, 'bobot'=>4],
        ];

        $this->db->table('preferensi')->insertBatch($data);
    }
}
