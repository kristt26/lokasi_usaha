<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table      = 'kriteria';
    protected $primaryKey = 'id';

    // protected $returnType = 'object';

    protected $allowedFields = [
        'nama',
        'kode',
        'bobot',
        'type'
    ];

    protected $useTimestamps = false;
}
