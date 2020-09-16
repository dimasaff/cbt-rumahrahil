<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Tkd_sbm_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sbmptn_api/tkd_sbm_model', 'api');
    }
    public function index_get()
    {
        $tkd = $this->get('id_tkd_sbmptn');
        if ($tkd === null) {
            $gettkd = $this->api->getTKDsbm();
        } else {
            $gettkd = $this->api->getTKDsbm($tkd);
        }
        if ($gettkd) {
            $this->response([
                'status' => true,
                'data' => $gettkd

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
