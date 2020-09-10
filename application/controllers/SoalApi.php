<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class SoalApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Soal_model', 'api');
    }
    public function index_get()
    {
        $Soal = $this->get('id_soal');
        if ($Soal === null) {
            $getSoal = $this->api->getSoal();
        } else {
            $getSoal = $this->api->getSoal($Soal);
        }
        if ($getSoal) {
            $this->response([
                'status' => true,
                'data' => $getSoal

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $Soal = $this->delete('id_soal');

        if (!$Soal) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSoal($Soal) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'deleted success'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id_soal' => $this->post('id_soal'),
            'tingkat_id' => $this->post('tingkat_id'),
            'subtema_id' => $this->post('subtema_id'),
            'kunci_jawaban_id' => $this->post('kunci_jawaban_id'),
            'soal' => $this->post('soal'),
            'soal_gambar' => $this->post('soal_gambar'),
            'soal_suara' => $this->post('soal_suara')
        ];
        if ($this->api->createSoal($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed create data'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $Soal = $this->put('id_soal');
        $data = [
            'id_soal' => $this->put('id_soal'),
            'tingkat_id' => $this->put('tingkat_id'),
            'subtema_id' => $this->put('subtema_id'),
            'kunci_jawaban_id' => $this->put('kunci_jawaban_id'),
            'soal' => $this->put('soal'),
            'soal_gambar' => $this->put('soal_gambar'),
            'soal_suara' => $this->put('soal_suara')
        ];
        if ($this->api->updateSoal($data, $Soal) > 0) {
            $this->response([
                'status' => true,
                'message' => 'update success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
