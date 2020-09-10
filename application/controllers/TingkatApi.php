<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class TingkatApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Tingkat_model', 'api');
    }
    public function index_get()
    {
        $tingkat = $this->get('id_tingkat');
        if ($tingkat === null) {
            $gettingkat = $this->api->getTingkat();
        } else {
            $gettingkat = $this->api->getTingkat($tingkat);
        }
        if ($gettingkat) {
            $this->response([
                'status' => true,
                'data' => $gettingkat

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
