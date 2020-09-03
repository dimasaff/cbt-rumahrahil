<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Login';
        $this->load->view('templates/login_header', $data);
        $this->load->view('login/index');
        $this->load->view('templates/login_footer');
    }
}
