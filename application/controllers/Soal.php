<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{
    public function index()
    {
        if ($this->input->post('subtema') == null) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Soal';
            $data['subtema'] = $this->db->get('tb_subtema')->result_array();
            $data['jawabanBenar'] = $this->db->get('tb_kunci_jawaban')->result_array();
            $data['soal'] = $this->db->query('SELECT id_soal,subtema_id, kunci_jawaban_id, nama_subtema, jawaban_benar, soal, soal_gambar, soal_suara FROM tb_soal JOIN tb_subtema ON tb_soal.subtema_id = tb_subtema.id_subtema JOIN tb_kunci_jawaban ON tb_soal.kunci_jawaban_id = tb_kunci_jawaban.id_kunci_jawaban')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('soal/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'subtema_id' => $this->input->post('subtema'),
                'kunci_jawaban_id' => $this->input->post('answer'),
                'soal' => htmlspecialchars($this->input->post('question')),
                'soal_gambar' => $this->input->post('questionPicture'),
                'soal_suara' => $this->input->post('questionAudio')
            ];
            $this->db->insert('tb_soal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil di Tambahkan</div>');
            redirect('Soal');
        }
    }
    public function updateSoal($id)
    {
        $data = [
            'subtema_id' => $this->input->post('subtema'),
            'kunci_jawaban_id' => $this->input->post('answer'),
            'soal' => htmlspecialchars($this->input->post('question')),
            'soal_gambar' => $this->input->post('questionPicture'),
            'soal_suara' => $this->input->post('questionAudio')
        ];
        $this->db->where('id_soal', $id);
        $this->db->update('tb_soal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil di update</div>');
        redirect('Soal');
    }
    public function deleteSoal($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('tb_soal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">soal Berhasil di delete</div>');
        redirect('soal');
    }
}
