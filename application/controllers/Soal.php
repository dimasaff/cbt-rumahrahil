<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
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
        if ($this->input->post('subtema') == null) {
            if ($this->input->post('sortSubTema') == null) {
                $id = 0;
            } else {
                $id = $this->input->post('sortSubTema');
            }
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Soal';
            $data['subtema'] = $this->db->get('tb_subtema')->result_array();
            $data['jawabanBenar'] = $this->db->get('tb_kunci_jawaban')->result_array();
            $data['kelas'] = $this->db->get('tb_tingkat')->result_array();
            $data['soal'] = $this->db->query('SELECT id_soal,subtema_id, kunci_jawaban_id, tingkat_id, nama_tingkat, nama_subtema, jawaban_benar, soal, soal_gambar, soal_suara FROM tb_soal JOIN tb_subtema ON tb_soal.subtema_id = tb_subtema.id_subtema JOIN tb_kunci_jawaban ON tb_soal.kunci_jawaban_id = tb_kunci_jawaban.id_kunci_jawaban JOIN tb_tingkat ON tb_soal.tingkat_id = tb_tingkat.id_tingkat WHERE subtema_id = ' . $id)->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('soal/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_images = $_FILES['image'];
            if ($upload_images) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('soal');
                }
            }
            $data = [
                'tingkat_id' => $this->input->post('class'),
                'subtema_id' => $this->input->post('subtema'),
                'kunci_jawaban_id' => $this->input->post('answer'),
                'soal' => htmlspecialchars($this->input->post('question')),
                'soal_gambar' => htmlspecialchars($newImage),
                'soal_suara' => $this->input->post('questionAudio')
            ];

            $this->db->insert('tb_soal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil di Tambahkan</div>');
            redirect('Soal');
        }
    }
    public function updateSoal($id)
    {
        $data['soal'] = $this->db->query('SELECT id_soal,subtema_id, kunci_jawaban_id, tingkat_id, nama_tingkat, nama_subtema, jawaban_benar, soal, soal_gambar, soal_suara FROM tb_soal JOIN tb_subtema ON tb_soal.subtema_id = tb_subtema.id_subtema JOIN tb_kunci_jawaban ON tb_soal.kunci_jawaban_id = tb_kunci_jawaban.id_kunci_jawaban JOIN tb_tingkat ON tb_soal.tingkat_id = tb_tingkat.id_tingkat WHERE id_soal = ' . $id)->row_array();
        $upload_images = $_FILES['updateImage'];
        if ($upload_images) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2000';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('updateImage')) {
                $old_image = $data['soal']['soal_gambar'];
                $newImage = $this->upload->data('file_name');
                unlink(FCPATH . 'assets/img/' . $old_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('soal');
            }
        }
        $data = [
            'tingkat_id' => $this->input->post('class'),
            'subtema_id' => $this->input->post('subtema'),
            'kunci_jawaban_id' => $this->input->post('answer'),
            'soal' => htmlspecialchars($this->input->post('question')),
            'soal_gambar' => htmlspecialchars($newImage),
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
            if ($this->input->post('sortSubtema') == null) {
                $id = 0;
            } else {
                $id = $this->input->post('sortSubtema');
            }
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Jawaban';
            $data['subtema'] = $this->db->get('tb_subtema')->result_array();
            $data['soal'] = $this->db->get('tb_soal')->result_array();
            $data['jawaban'] = $this->db->query('SELECT id_jawaban, soal_id, subtema_id, soal, soal_gambar, soal, soal_gambar, soal_suara, option_a, option_b, option_c, option_d FROM tb_jawaban JOIN tb_soal ON tb_jawaban.soal_id = tb_soal.id_soal WHERE subtema_id = ' . $id)->result_array();
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
    public function deleteJawaban($id)
    {
        $this->db->where('id_jawaban', $id);
        $this->db->delete('tb_jawaban');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">soal Berhasil di delete</div>');
        redirect('soal/jawaban');
    }
}
