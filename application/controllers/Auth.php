<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('Form_validation', 'session');
        $this->load->helper(array('Form', 'Cookie', 'String'));
    }

    function index()
    {
        $cookie = get_cookie('talent');
        if ($this->session->userdata('logged')) {
            redirect('welcome');
        } else if ($cookie <> '') {
            // cek cookie
            $row = $this->Auth_model->get_by_cookie($cookie)->row();
            if ($row) {
                $this->_daftarkan_session($row);
            } else {
                $data = array(
                    'email' => set_value('email'),
                    'password' => set_value('password'),
                    'remember' => set_value('remember'),
                    'message' => $this->session->flashdata('message'),
                );
                $this->load->view('auth/login', $data);
            }
        } else {
            $data = array(
                'email' => set_value('email'),
                'password' => set_value('password'),
                'remember' => set_value('remember'),
                'message' => $this->session->flashdata('message'),
            );
            $this->load->view('auth/login', $data);
        }
    }

    public function cheklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password', TRUE);
        $remember = $this->input->post('remember');
        $row = $this->Auth_model->login($username);
        if ($row) {
            $userPassword = $row->password;
            if (password_verify($password, $userPassword)) {
                // 1. Buat Cookies jika remember di check - login berhasil
                if ($remember) {
                    $key = random_string('alnum', 64);
                    set_cookie('talent', $key, 3600 * 24 * 360); // set expired 1 tahun
                    $update_key = array(
                        'cookie' => $key
                    );
                    $this->Auth_model->update($update_key, $row->id_users);
                }
                $this->_daftarkan_session($row);
            } else {
                redirect('auth');
            }
        } else {
            // login gagal
            $this->session->set_flashdata('status_login', 'email atau password salah');
            $this->index();
        }
    }

    public function _daftarkan_session($row)
    {
        // 1. Daftarkan Session
        $sess = array(
            'logged' => TRUE,
            'id_users' => $row->id_users,
            'username' => $row->username,
            'id_user_level' => $row->id_user_level,
            'is_aktif' => $row->is_aktif,
            'cookie' => $row->cookie,
            'nama_lengkap' => $row->nama_lengkap,
            'kontak' => $row->kontak,
            'perusahaan' => $row->perusahaan,
            'images' => $row->images,
            'nama_level' => $row->nama_level,
        );
        $this->session->set_userdata($sess);
        redirect('welcome');
    }

    public function logout()
    {
        // delete cookie dan session
        delete_cookie('talent');
        $this->session->sess_destroy();
        redirect('auth');
    }
}
