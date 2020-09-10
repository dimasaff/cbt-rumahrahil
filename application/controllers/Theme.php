<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Theme extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->input->post('classroom') == null) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Tema';
            $data['tingkat'] = $this->db->get('tb_tingkat')->result_array();
            $data['tema'] = $this->db->query('SELECT id_tema, tingkat_id, nama_tingkat, nama_tema FROM tb_tema JOIN tb_tingkat ON tb_tema.tingkat_id = tb_tingkat.id_tingkat')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tema/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tingkat_id' => $this->input->post('classroom'),
                'nama_tema' => htmlspecialchars($this->input->post('nameTheme'))
            ];
            $this->db->insert('tb_tema', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tema Berhasil di Tambahkan</div>');
            redirect('theme');
        }
    }
    public function updateTheme($id)
    {
        $data = [
            'tingkat_id' => $this->input->post('classroom'),
            'nama_tema' => htmlspecialchars($this->input->post('nameTheme'))
        ];
        $this->db->where('id_tema', $id);
        $this->db->update('tb_tema', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tema Berhasil di update</div>');
        redirect('theme');
    }
    public function deleteTheme($id)
    {
        $this->db->where('id_tema', $id);
        $this->db->delete('tb_tema');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tema Berhasil di delete</div>');
        redirect('theme');
    }
    public function subTema()
    {
        if ($this->input->post('nameTheme') == null) {
            if ($this->input->post('sortTema') == null) {
                $id = 0;
            } else {
                $id = $this->input->post('sortTema');
            }
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'SubTema';
            $data['tema'] = $this->db->get('tb_tema')->result_array();
            $data['subtema'] = $this->db->query("SELECT id_subtema, tema_id, nama_tema, nama_subtema FROM tb_subtema JOIN tb_tema ON tb_subtema.tema_id = tb_tema.id_tema WHERE tema_id = $id")->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tema/subtema', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tema_id' => $this->input->post('nameTheme'),
                'nama_subtema' => htmlspecialchars($this->input->post('nameSubTheme'))
            ];
            $this->db->insert('tb_subtema', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubTema Berhasil di Tambahkan</div>');
            redirect('theme/subtema');
        }
    }
    public function updateSubtema($id)
    {
        $data = [
            'tema_id' => $this->input->post('nameTheme'),
            'nama_subtema' => htmlspecialchars($this->input->post('nameSubTheme'))
        ];
        $this->db->where('id_subtema', $id);
        $this->db->update('tb_subtema', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubTema Berhasil di Tambahkan</div>');
        redirect('theme/subtema');
    }
    public function deleteSubtheme($id)
    {
        $this->db->where('id_subtema', $id);
        $this->db->delete('tb_subtema');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tema Berhasil di delete</div>');
        redirect('theme');
    }
}
