<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorModel extends Model
{
    protected $table      = 'indikator';
    protected $primaryKey = 'id';

    // protected $returnType = 'object';

    protected $allowedFields = [
        'kriteria_id',
        'indikator',
        'bobot'
    ];

    protected $useTimestamps = false;

    public function getByKriteria($kriteriaId)
    {
        return $this->where('kriteria_id', $kriteriaId)->findAll();
    }
}
