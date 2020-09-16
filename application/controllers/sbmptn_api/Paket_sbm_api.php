<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Paket_sbm_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sbmptn_api/paket_sbm_model', 'api');
    }
    public function index_get()
    {
        $paket = $this->get('id_paket_sbmptn');
        if ($paket === null) {
            $getPaket = $this->api->getPaketsbm();
        } else {
            $getPaket = $this->api->getPaketsbm($paket);
        }
        if ($getPaket) {
            $this->response([
                'status' => true,
                'data' => $getPaket

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
        $paket = $this->delete('id_paket_sbmptn');

        if (!$paket) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deletePaketsbm($paket) > 0) {
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
            'id_paket_sbmptn' => $this->post('id_paket_sbmptn'),
            'nama_paket_sbmptn' => $this->post('nama_paket_sbmptn')
            
        ];
        if ($this->api->createPaketsbm($data) > 0) {
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
        $paket = $this->put('id_paket_sbmptn');
        $data = [
            'id_paket_sbmptn' => $this->put('id_paket_sbmptn'),
            'nama_paket_sbmptn' => $this->put('nama_paket_sbmptn')
        ];
        if ($this->api->updatePaketsbm($data, $Soal) > 0) {
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
