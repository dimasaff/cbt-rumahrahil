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
            $data['kelas'] = $this->db->get('tb_tingkat')->result_array();
            $data['soal'] = $this->db->query('SELECT id_soal,subtema_id, kunci_jawaban_id, tingkat_id, nama_tingkat, nama_subtema, jawaban_benar, soal, soal_gambar, soal_suara FROM tb_soal JOIN tb_subtema ON tb_soal.subtema_id = tb_subtema.id_subtema JOIN tb_kunci_jawaban ON tb_soal.kunci_jawaban_id = tb_kunci_jawaban.id_kunci_jawaban JOIN tb_tingkat ON tb_soal.tingkat_id = tb_tingkat.id_tingkat')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('soal/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tingkat_id' => $this->input->post('class'),
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
            'tingkat_id' => $this->input->post('class'),
            'subtema_id' => $this->input->post('subtema'),
            'kunci_jawaban_id' => $this->input->post('answer'),
            'soal' => htmlspecialchars($this->input->post('question')),
            'soal_gambar' => htmlspecialchars($this->input->post('questionPicture')),
            'soal_suara' => htmlspecialchars($this->input->post('questionAudio'))
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
    public function jawaban()
    {
        if ($this->input->post('option_a') == null) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Jawaban';
            $data['subtema'] = $this->db->get('tb_subtema')->result_array();
            $data['soal'] = $this->db->get('tb_soal')->result_array();
            $data['jawaban'] = $this->db->query('SELECT id_jawaban, soal_id, soal, soal_gambar, soal, soal_gambar, soal_suara, option_a, option_b, option_c, option_d FROM tb_jawaban JOIN tb_soal ON tb_jawaban.soal_id = tb_soal.id_soal')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('soal/jawaban', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'soal_id' => $this->input->post('soal'),
                'option_a' => htmlspecialchars($this->input->post('option_a')),
                'option_b' => htmlspecialchars($this->input->post('option_b')),
                'option_c' => htmlspecialchars($this->input->post('option_c')),
                'option_d' => htmlspecialchars($this->input->post('option_d')),
            ];
            $this->db->insert('tb_jawaban', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil di Tambahkan</div>');
            redirect('Soal/jawaban');
        }
    }
    public function updateJawaban($id)
    {
        $data = [
            'soal_id' => $this->input->post('soal'),
            'option_a' => htmlspecialchars($this->input->post('option_a')),
            'option_b' => htmlspecialchars($this->input->post('option_b')),
            'option_c' => htmlspecialchars($this->input->post('option_c')),
            'option_d' => htmlspecialchars($this->input->post('option_d')),
        ];
        $this->db->where('id_jawaban', $id);
        $this->db->update('tb_jawaban', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil di update</div>');
        redirect('Soal/jawaban');
    }
}
