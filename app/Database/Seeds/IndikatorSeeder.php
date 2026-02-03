<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // C1 – Tingkat Kepadatan Penduduk
            ['kriteria_id' => 1, 'indikator' => 'Sangat rendah', 'bobot' => 1],
            ['kriteria_id' => 1, 'indikator' => 'Rendah',        'bobot' => 2],
            ['kriteria_id' => 1, 'indikator' => 'Sedang',        'bobot' => 3],
            ['kriteria_id' => 1, 'indikator' => 'Tinggi',        'bobot' => 4],
            ['kriteria_id' => 1, 'indikator' => 'Sangat tinggi', 'bobot' => 5],

            // C2 – Kemudahan Akses
            ['kriteria_id' => 2, 'indikator' => 'Jarak > 10 km (sangat jauh)', 'bobot' => 1],
            ['kriteria_id' => 2, 'indikator' => 'Jarak 6–10 km (jauh)',         'bobot' => 2],
            ['kriteria_id' => 2, 'indikator' => 'Jarak 3–6 km (sedang)',        'bobot' => 3],
            ['kriteria_id' => 2, 'indikator' => 'Jarak < 3 km (dekat)',         'bobot' => 4],

            // C3 – Biaya Sewa
            ['kriteria_id' => 3, 'indikator' => '> Rp 10 juta/bulan (sangat mahal)', 'bobot' => 1],
            ['kriteria_id' => 3, 'indikator' => 'Rp 7–10 juta/bulan (mahal)',        'bobot' => 2],
            ['kriteria_id' => 3, 'indikator' => 'Rp 4–7 juta/bulan (sedang)',        'bobot' => 3],
            ['kriteria_id' => 3, 'indikator' => '< Rp 4 juta/bulan (murah)',         'bobot' => 4],

            // C4 – Potensi Pasar
            ['kriteria_id' => 4, 'indikator' => '< 500 orang',        'bobot' => 1],
            ['kriteria_id' => 4, 'indikator' => '500–1.000 orang',    'bobot' => 2],
            ['kriteria_id' => 4, 'indikator' => '1.000–2.000 orang',  'bobot' => 3],
            ['kriteria_id' => 4, 'indikator' => '> 2.000 orang',      'bobot' => 4],

            // C5 – Tingkat Persaingan Usaha
            ['kriteria_id' => 5, 'indikator' => '> 10 kompetitor (sangat tinggi)', 'bobot' => 1],
            ['kriteria_id' => 5, 'indikator' => '7–10 kompetitor (tinggi)',        'bobot' => 2],
            ['kriteria_id' => 5, 'indikator' => '4–6 kompetitor (sedang)',         'bobot' => 3],
            ['kriteria_id' => 5, 'indikator' => '< 4 kompetitor (rendah)',         'bobot' => 4],
        ];

        $this->db->table('indikator')->insertBatch($data);
    }
}
