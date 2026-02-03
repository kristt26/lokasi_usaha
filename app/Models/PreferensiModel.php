<?php

namespace App\Models;

use CodeIgniter\Model;

class PreferensiModel extends Model
{
    protected $table      = 'preferensi';
    protected $primaryKey = 'id';

    // protected $returnType = 'object';

    protected $allowedFields = [
        'kriteria_id',
        'lokasi_id',
        'value',
        'bobot'
    ];

    protected $useTimestamps = false;

    public function getMatriks()
    {
        return $this->select('lokasi_id, kriteria_id, value')
                    ->orderBy('lokasi_id', 'ASC')
                    ->orderBy('kriteria_id', 'ASC')
                    ->findAll();
    }

    public function getByLokasi($lokasiId)
    {
        return $this->where('lokasi_id', $lokasiId)->findAll();
    }
}
