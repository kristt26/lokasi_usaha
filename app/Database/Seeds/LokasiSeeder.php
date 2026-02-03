<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode' => 'A1',
                'nama' => 'Ruko depan pelabuhan Jayapura',
                'desc' => 'Lokasi strategis di area pelabuhan dengan lalu lintas tinggi dan aktivitas ekonomi yang padat.'
            ],
            [
                'kode' => 'A2',
                'nama' => 'Ruko samping BNI kota samping Aston',
                'desc' => 'Berlokasi di pusat kota dengan akses mudah serta dekat dengan perbankan dan hotel.'
            ],
            [
                'kode' => 'A3',
                'nama' => 'Ruko samping Laundry Monica Jayapura Utara',
                'desc' => 'Lingkungan permukiman dengan potensi pelanggan tetap dari warga sekitar.'
            ],
            [
                'kode' => 'A4',
                'nama' => 'Ruko samping Mr. DIY Yapis',
                'desc' => 'Area komersial dengan tingkat kunjungan tinggi dan fasilitas umum yang lengkap.'
            ],
            [
                'kode' => 'A5',
                'nama' => 'Ruko samping pangkalan ojek Dok 9 Kali',
                'desc' => 'Dekat dengan transportasi umum dan memiliki mobilitas masyarakat yang tinggi.'
            ],
            [
                'kode' => 'A6',
                'nama' => 'Ruko samping Mr. DIY Waena',
                'desc' => 'Terletak di kawasan pendidikan dan perdagangan dengan arus pengunjung yang stabil.'
            ],
            [
                'kode' => 'A7',
                'nama' => 'Ruko samping BRI Padang Bulan Tanjakan Ale',
                'desc' => 'Berada di jalur utama dengan visibilitas tinggi dan akses jalan yang baik.'
            ],
            [
                'kode' => 'A8',
                'nama' => 'Ruko lampu merah Otonom samping BNI',
                'desc' => 'Lokasi di persimpangan jalan besar dengan kepadatan kendaraan yang tinggi.'
            ],
            [
                'kode' => 'A9',
                'nama' => 'Ruko samping Luwes depan Pasar Cigombong',
                'desc' => 'Dekat dengan pasar tradisional sehingga memiliki potensi pelanggan yang besar.'
            ],
            [
                'kode' => 'A10',
                'nama' => 'Ruko depan terminal baru Entrop samping Vatos',
                'desc' => 'Area transportasi umum dengan aktivitas masyarakat yang berlangsung sepanjang hari.'
            ],
            [
                'kode' => 'A11',
                'nama' => 'Ruko Pasar Entrop belakang terminal baru',
                'desc' => 'Lingkungan perdagangan yang ramai dengan interaksi langsung masyarakat.'
            ],
            [
                'kode' => 'A12',
                'nama' => 'Ruko Jalan Raya Abepura (dekat Pasar Yotefa)',
                'desc' => 'Lokasi strategis di jalan utama Abepura dengan arus lalu lintas yang tinggi.'
            ],
            [
                'kode' => 'A13',
                'nama' => 'Ruko kawasan Terminal Lama Abepura',
                'desc' => 'Kawasan lama yang masih aktif secara ekonomi dengan pelanggan setia.'
            ],
            [
                'kode' => 'A14',
                'nama' => 'Ruko Jalan Pendidikan (dekat UNCEN)',
                'desc' => 'Berada di sekitar kampus dengan potensi pasar dari mahasiswa dan staf akademik.'
            ],
        ];

        $this->db->table('lokasi')->insertBatch($data);
    }
}
