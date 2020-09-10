<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class SubtemaApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Subtema_model', 'api');
    }
    public function index_get()
    {
        $subtema = $this->get('id_subtema');
        if ($subtema === null) {
            $getsubtema = $this->api->getSubtema();
        } else {
            $getsubtema = $this->api->getSubtema($subtema);
        }
        if ($getsubtema) {
            $this->response([
                'status' => true,
                'data' => $getsubtema

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
        $subtema = $this->delete('id_subtema');

        if (!$subtema) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSubtema($subtema) > 0) {
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
            'id_subtema' => $this->post('id_subtema'),
            'tema_id' => $this->post('tema_id'),
            'nama_subtema' => $this->post('nama_subtema')

        ];
        if ($this->api->createSubtema($data) > 0) {
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
        $subtema = $this->put('id_subtema');
        $data = [
            'id_subtema' => $this->put('id_subtema'),
            'tema_id' => $this->put('tema_id'),
            'nama_subtema' => $this->put('nama_subtema')
        ];
        if ($this->api->updateSubtema($data, $subtema) > 0) {
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
