<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class JawabanApi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Jawaban_model', 'api');
    }
    public function index_get()
    {
        $Jawaban = $this->get('id_jawaban');
        if ($Jawaban === null) {
            $getJawaban = $this->api->getJawaban();
        } else {
            $getJawaban = $this->api->getJawaban($Jawaban);
        }
        if ($getJawaban) {
            $this->response([
                'status' => true,
                'data' => $getJawaban

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
        $Jawaban = $this->delete('id_jawaban');

        if (!$Jawaban) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteJawaban($Jawaban) > 0) {
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
            'id_jawaban' => $this->post('id_jawaban'),
            'soal_id' => $this->post('soal_id'),
            'option_a' => $this->post('option_a'),
            'option_b' => $this->post('option_b'),
            'option_c' => $this->post('option_c'),
            'option_d' => $this->post('option_d')

        ];
        if ($this->api->createJawaban($data) > 0) {
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
        $Jawaban = $this->put('id_jawaban');
        $data = [
            'id_jawaban' => $this->put('id_jawaban'),
            'soal_id' => $this->put('saol_id'),
            'option_a' => $this->put('option_a'),
            'option_b' => $this->put('option_b'),
            'option_c' => $this->put('option_c'),
            'option_d' => $this->put('option_d')
        ];
        if ($this->api->updateJawaban($data, $Jawaban) > 0) {
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
