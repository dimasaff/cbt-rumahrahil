<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class KunciApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Kunci_model', 'api');
    }
    public function index_get()
    {
        $kunci = $this->get('id_kunci_jawaban');
        if ($kunci === null) {
            $getkunci = $this->api->getKunci();
        } else {
            $getkunci = $this->api->getKunci($kunci);
        }
        if ($getkunci) {
            $this->response([
                'status' => true,
                'data' => $getkunci

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
