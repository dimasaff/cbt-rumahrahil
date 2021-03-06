<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kunci_cpns_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cpns_api/kunci_cpns_model', 'api');
    }
    public function index_get()
    {
        $kunci = $this->get('id_kunci_cpns');
        if ($kunci === null) {
            $getKunci = $this->api->getKuncicpns();
        } else {
            $getKunci = $this->api->getKuncicpns($kunci);
        }
        if ($getKunci) {
            $this->response([
                'status' => true,
                'data' => $getKunci

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
        $kunci = $this->delete('id_kunci_cpns');

        if (!$kunci) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteKuncicpns($kunci) > 0) {
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
            'id_kunci_cpns' => $this->post('id_kunci_cpns'),
            'kunci_jawaban_cpns' => $this->post('kunci_jawaban_cpns')
            
        ];
        if ($this->api->createKuncicpns($data) > 0) {
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
        $kunci = $this->put('id_kunci_cpns');
        $data = [
            'id_kunci_cpns' => $this->put('id_kunci_cpns'),
            'kunci_jawaban_cpns' => $this->put('kunci_jawaban_cpns')
        ];
        if ($this->api->updateKuncicpns($data, $kunci) > 0) {
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
