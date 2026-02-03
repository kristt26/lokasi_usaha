<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('KriteriaSeeder');
        $this->call('LokasiSeeder');
        $this->call('IndikatorSeeder');
        $this->call('UserSeeder');
        $this->call('PreferensiSeeder');
    }
}
