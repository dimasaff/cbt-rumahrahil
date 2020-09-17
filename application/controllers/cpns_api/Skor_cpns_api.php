<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Skor_cpns_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cpns_api/skor_cpns_model', 'api');
    }
    public function index_get()
    {
        $skor = $this->get('id_skor_cpns');
        if ($skor === null) {
            $getskor = $this->api->getSkorcpns();
        } else {
            $getskor = $this->api->getSkorcpns($skor);
        }
        if ($getskor) {
            $this->response([
                'status' => true,
                'data' => $getskor

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
        $skor = $this->delete('id_skor_cpns');

        if (!$skor) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSkorcpns($skor) > 0) {
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
            'id_skor_cpns' => $this->post('id_skor_cpns'),
            'skor_cpns' => $this->post('skor_cpns')
            
        ];
        if ($this->api->createSkorcpns($data) > 0) {
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
        $skor = $this->put('id_skor_cpns');
        $data = [
            'id_skor_cpns' => $this->put('id_skor_cpns'),
            'skor_cpns' => $this->put('skor_cpns')
        ];
        if ($this->api->updateSkorcpns($data, $skor) > 0) {
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
