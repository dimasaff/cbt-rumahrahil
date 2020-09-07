<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['fixedFooter'] = 'fixed-bottom';
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/login_footer');
        } else {
            $this->_login();
        }
    }
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'required' => 'Email wajib di isi',
            'valid_email' => 'Email harus berupa email'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'password wajib di isi',
            'min_length' => 'password harus sejumlah 8 karakter',
            'matches' => 'password harus sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('regist', 'Regist', 'required|trim', [
            'required' => 'Data wajib di isi'
        ]);
        $this->form_validation->set_rules('classroom', 'Classroom', 'required|trim', [
            'required' => 'Kelas wajib di isi'
        ]);
        $this->form_validation->set_rules('school', 'School', 'required|trim', [
            'required' => 'Asal sekolah wajib di isi'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required|trim', [
            'required' => 'Alamat wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['role'] = $this->db->query('SELECT * FROM tb_role WHERE id_role > 1')->result_array();
            $data['tingkat'] = $this->db->get('tb_tingkat')->result_array();
            $data['fixedFooter'] = 'mt-1';
            $data['title'] = 'Registrasi User';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/registration', $data);
            $this->load->view('templates/login_footer');
        } else {
            $data = [
                'role_id' => $this->input->post('regist'),
                'tingkat_id' => $this->input->post('classroom'),
                'nama' => htmlspecialchars($this->input->post('name')),
                'alamat' => htmlspecialchars($this->input->post('address')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'asal_sekolah' => htmlspecialchars($this->input->post('school'))
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah terdaftar, silahkan login</div>');
            redirect('login');
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['role_id'] == 1) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    echo "halaman siswa/guru (masih tahap pengambangan)";
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar</div>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('login');
    }
}
