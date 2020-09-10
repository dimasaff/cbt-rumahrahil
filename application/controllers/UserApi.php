<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class UserApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/User_model', 'api');
    }
    public function index_get()
    {
        $user = $this->get('id_user');
        if ($user === null) {
            $getuser = $this->api->getUser();
        } else {
            $getuser = $this->api->getUser($user);
        }
        if ($getuser) {
            $this->response([
                'status' => true,
                'data' => $getuser

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
        $user = $this->delete('id_user');

        if (!$user) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteUser($user) > 0) {
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
            'role_id' => $this->post('role_id'),
            'tingkat_id' => $this->post('tingkat_id'),
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'email' => $this->post('email'),
            'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
            'asal_sekolah' => $this->post('asal_sekolah')
        ];
        if ($this->api->createUser($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new user has been created'
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
        $user = $this->put('id_user');
        $data = [
            'role_id' => $this->put('role_id'),
            'tingkat_id' => $this->put('tingkat_id'),
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'email' => $this->put('email'),
            'password' => password_hash($this->put('password'), PASSWORD_DEFAULT),
            'asal_sekolah' => $this->put('asal_sekolah')
        ];
        if ($this->api->updateUser($data, $user) > 0) {
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
