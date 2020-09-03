<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['fixedFooter'] = 'fixed-bottom';
        $data['title'] = 'Halaman Login';
        $this->load->view('templates/login_header', $data);
        $this->load->view('login/index');
        $this->load->view('templates/login_footer');
    }
    public function registration()
    {
        $data['fixedFooter'] = 'mt-1';
        $data['title'] = 'Registrasi User';
        $this->load->view('templates/login_header', $data);
        $this->load->view('login/registration');
        $this->load->view('templates/login_footer');
    }
}
