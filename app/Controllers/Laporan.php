<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use ajn\dss_library\Moora as moora;

class Laporan extends BaseController
{
    use ResponseTrait;
    protected $periode;
    protected $kriteria;
    protected $alternatif;
    protected $preferensi;
    public function __construct()
    {
        $this->kriteria = new \App\Models\KriteriaModel();
        $this->alternatif = new \App\Models\LokasiModel();
        $this->preferensi = new \App\Models\PreferensiModel();
    }
    public function index()
    {
        return view('laporan');
    }
    public function hitung()
    {
        // $data = $this->request->getJSON();
        try {
            $kriterias = $this->kriteria->findAll();
            $alternatifs = $this->alternatif->findAll();
            $result = array();
            foreach ($alternatifs as $key => $alternatif) {
                $ipa = 0;
                $ips = 0;
                $alternatif['nilai'] = array();
                foreach ($kriterias as $key => $kriteria) {
                    $kriterias[$key]['bobot'] = (int) $kriterias[$key]['bobot'];
                    $item = $this->preferensi->where('lokasi_id', $alternatif['id'])->where('kriteria_id', $kriteria['id'])->first();
                    if ($kriteria['kode'] == 'C1' || $kriteria['kode'] == 'C3')
                        $ipa += (int)$item['value'];
                    else
                        $ips += (int)$item['value'];
                    $item['kode'] = $kriteria['kode'];
                    $item['bobot'] = (int) $item['bobot'];
                    $alternatif['nilai'][] = $item;
                }
                $ipa = $ipa / 2;
                $ips = $ips / 2;
                if ($ipa > $ips) $alternatif['jurusan'] = "IPA";
                else $alternatif['jurusan'] = "IPS";
                $result[] = $alternatif;
            }
            $htg = new moora($kriterias, $result, 7);
            return $this->respond($htg);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
