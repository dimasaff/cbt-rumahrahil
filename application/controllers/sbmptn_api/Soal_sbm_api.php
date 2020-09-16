<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Soal_sbm_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sbmptn_api/soal_sbm_model', 'api');
    }
    public function index_get()
    {
        $Soal = $this->get('id_soal_sbmptn');
        if ($Soal === null) {
            $getSoal = $this->api->getSoalsbm();
        } else {
            $getSoal = $this->api->getSoalsbm($Soal);
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
        $Soal = $this->delete('id_soal_sbmptn');

        if (!$Soal) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSoalsbm($Soal) > 0) {
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
            'id_soal_sbmptn' => $this->post('id_soal_sbmptn'),
            'kategori_sbmptn_id' => $this->post('kategori_sbmptn_id'),
            'tkd_sbmptn_id' => $this->post('tkd_sbmptn_id'),
            'kunci_sbmptn_id' => $this->post('kunci_sbmptn_id'),
            'paket_sbmptn_id' => $this->post('paket_sbmptn_id'),
            'soal_text' => $this->post('soal_text'),
            'soal_gambar' => $this->post('soal_gambar'),
            'skor' => $this->post('skor')
        ];
        if ($this->api->createSoalsbm($data) > 0) {
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
        $Soal = $this->put('id_soal_sbmptn');
        $data = [
            'id_soal_sbmptn' => $this->put('id_soal_sbmptn'),
            'kategori_sbmptn_id' => $this->put('kategori_sbmptn_id'),
            'tkd_sbmptn_id' => $this->put('tkd_sbmptn_id'),
            'kunci_sbmptn_id' => $this->put('kunci_sbmptn_id'),
            'paket_sbmptn_id' => $this->put('paket_sbmptn_id'),
            'soal_text' => $this->put('soal_text'),
            'soal_gambar' => $this->put('soal_gambar'),
            'skor' => $this->put('skor')
        ];
        if ($this->api->updateSoalsbm($data, $Soal) > 0) {
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
