<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SetupDatabase extends BaseCommand
{
    protected $group       = 'Database';
    protected $name        = 'db:setup';
    protected $description = 'Membuat database jika belum ada, lalu menjalankan migration';

    public function run(array $params)
    {
        $dbName = config('Database')->default['database'];

        // Koneksi TANPA database
        $config = config('Database')->default;
        $config['database'] = null;

        $db = Database::connect($config);

        // Cek database
        $exists = $db->query("SHOW DATABASES LIKE '{$dbName}'")->getResult();

        if (empty($exists)) {
            CLI::write("Database '{$dbName}' belum ada. Membuat database...", 'yellow');
            $db->query("CREATE DATABASE {$dbName} CHARACTER SET utf8mb4");
            CLI::write("Database berhasil dibuat.", 'green');
        } else {
            CLI::write("Database '{$dbName}' sudah tersedia.", 'green');
        }

        // Jalankan migration (CI 4.3.x compatible)
        CLI::write("Menjalankan migration...", 'yellow');
        service('commands')->run('migrate', []);

        CLI::write("Setup database selesai.", 'green');
    }
}
