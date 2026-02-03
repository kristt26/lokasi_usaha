<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;
use ocs\spklib\Moora as moora;

class Alternatif extends BaseController
{
    use ResponseTrait;
    protected $kriteria;
    protected $range;
    protected $decode;
    protected $alternatif;
    protected $preferensi;
    protected $db;
    protected $periode;
    public function __construct()
    {
        $this->kriteria = new \App\Models\KriteriaModel();
        $this->range = new \App\Models\IndikatorModel();
        $this->decode = new \App\Libraries\Decode();
        $this->alternatif = new \App\Models\LokasiModel();
        $this->preferensi = new \App\Models\PreferensiModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        return view('alternatif');
    }

    public function set_data()
    {
        try {
            $data = $this->request->getJSON();
            return $this->respond($this->toJson($this->decode->decodebase64($data->base64)));
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function range($id = null)
    {
        return view('kriteria');
    }
    public function read()
    {
        try {
            $alternatif = $this->alternatif->findAll();
            return $this->respond($alternatif);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function post()
    {
        $data = $this->request->getJSON();
        try {
            $this->db->transException(true)->transStart();
            // $data->lokasi = isset($data->berkas) ? $this->decode->decodebase64($data->berkas->base64, null) : null;
            $data->id = $this->alternatif->insert($data, true);
            $this->db->transComplete();
            return $this->respond($data);
        } catch (DatabaseException $e) {
            return $this->fail($e->getMessage());
        }
    }
    public function put()
    {
        try {
            $this->db->transException(true)->transStart();
            $data = $this->request->getJSON();
            // $data->lokasi = isset($data->berkas) ? $this->decode->decodebase64($data->berkas->base64, null) : $data->lokasi;
            $this->alternatif->update($data->id, $data);
            $this->db->transComplete();
            return $this->respond($data);
        } catch (\Throwable $th) {
            $this->db->transRollback();
            return $this->fail($th->getMessage());
        }
    }
    public function deleted($id = null)
    {
        try {
            $item = $this->alternatif->where('id', $id)->first();
            $this->decode->deleteFile($item['lokasi']);
            if ($this->alternatif->delete($id));
            return $this->respondDeleted(true);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
