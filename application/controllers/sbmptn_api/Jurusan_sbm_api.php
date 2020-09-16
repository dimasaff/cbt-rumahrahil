<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Jurusan_sbm_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sbmptn_api/jurusan_sbm_model', 'api');
    }
    public function index_get()
    {
        $jurusan = $this->get('id_jurusan_sbmptn');
        if ($jurusan === null) {
            $getJurusan = $this->api->getJurusansbm();
        } else {
            $getJurusan = $this->api->getJurusansbm($jurusan);
        }
        if ($getJurusan) {
            $this->response([
                'status' => true,
                'data' => $getJurusan

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
