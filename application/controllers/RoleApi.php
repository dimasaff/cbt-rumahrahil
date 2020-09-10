<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class RoleApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Role_model', 'api');
    }
    public function index_get()
    {
        $role = $this->get('id_role');
        if ($role === null) {
            $getrole = $this->api->getRole();
        } else {
            $getrole = $this->api->getRole($role);
        }
        if ($getrole) {
            $this->response([
                'status' => true,
                'data' => $getrole

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
