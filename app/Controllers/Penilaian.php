<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Penilaian extends BaseController
{
    use ResponseTrait;
    protected $referensi;
    protected $alternatif;
    protected $kriteria;
    protected $range;
    public function __construct()
    {
        $this->referensi = new \App\Models\PreferensiModel();
        $this->alternatif = new \App\Models\LokasiModel();
        $this->kriteria = new \App\Models\KriteriaModel();
        $this->range = new \App\Models\IndikatorModel();
    }
    public function index()
    {
        return view('penilaian');
    }
    public function read()
    {
        try {
            $data['kriteria'] = $this->kriteria->asObject()->findAll();
            $range = $this->range->asObject()->findAll();
            foreach ($data['kriteria'] as $key => $value) {
                $value->range = [];
                foreach ($range as $key => $r) {
                    if ($value->id == $r->kriteria_id) {
                        $value->range[] = $r;
                    }
                }
            }
            $data['alternatif'] = $this->alternatif->asObject()->findAll();
            $preferensi = $this->referensi
                ->select("preferensi.*, kriteria.nama")
                ->join('kriteria', 'kriteria.id=preferensi.kriteria_id')
                ->findAll();
            foreach ($data['alternatif'] as $key => $value) {
                $value->nilai = [];
                foreach ($preferensi as $key => $pre) {
                    if ($value->id == $pre['lokasi_id']) {
                        $value->nilai[] = $pre;
                    }
                }
            }
            return $this->respond($data);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function post()
    {
        $conn = \Config\Database::connect();
        try {
            $conn->transException(true)->transStart();
            $data = $this->request->getJSON();
            $dataSimpan = [];
            $dataUpdate = [];
            foreach ($data as $key => $alt) {
                $dataAlt = [];
                foreach ($alt->kriterias as $key => $kri) {
                    $item = [
                        'kriteria_id' => $kri->id,
                        'alternatif_id' => $alt->id,
                        'bobot' => $kri->nilai,
                    ];
                    $dataAlt[] = $item;
                    if (isset($kri->pref_id)){
                        $item['id'] = $kri->pref_id;
                        $dataUpdate[] = $item;
                    }
                    else
                        $dataSimpan[] = $item;
                }
                $alt->nilai = $dataAlt;
            }
            $this->referensi->insertBatch($dataSimpan);
            $this->referensi->updateBatch($dataUpdate, 'id');
            $conn->transComplete();
            return $this->respond($data);
        } catch (\Throwable $th) {
            $conn->transRollback();
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        try {
            $data = $this->request->getJSON();
            if ($this->periode->update($data->id, $data)) {
                return $this->respondUpdated(true);
            }
            throw new \Exception("Gagal mengubah", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted()
    {
        //
    }
}
