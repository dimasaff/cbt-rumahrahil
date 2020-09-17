<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kategori_cpns_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cpns_api/kategori_cpns_model', 'api');
    }
    public function index_get()
    {
        $kategori = $this->get('id_kategori_cpns');
        if ($kategori === null) {
            $getkategori = $this->api->getKategoricpns();
        } else {
            $getkategori = $this->api->getKategoricpns($kategori);
        }
        if ($getkategori) {
            $this->response([
                'status' => true,
                'data' => $getkategori

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
