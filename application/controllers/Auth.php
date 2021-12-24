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
            redirect('auth');
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
            $this->session->set_flashdata('status_login', 'Email atau Password salah');
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
        if($row->id_user_level == 1 || $row->id_user_level == 2){
            redirect('welcome');
        } else {
            redirect('home_page');
        }
    }

    public function logout()
    {
        // delete cookie dan session
        delete_cookie('talent');
        $this->session->sess_destroy();
        redirect('home_page');
    }

    function register()
    {
        $data = array(
            'username' => set_value('username'),
            'password' => set_value('password'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'kontak' => set_value('kontak'),
            'perusahaan' => set_value('perusahaan'),
            'message' => $this->session->flashdata('message'),
        );
        $this->load->view('auth/register', $data);
    }

    function register_action()
    {
        $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
        $kontak = $this->input->post('kontak', TRUE);
        $username = $this->input->post('username', TRUE);
        $row = $this->Auth_model->login($username);
        if(empty($row->username)){
            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'kontak' => $kontak,
                'username' => $username,
                'id_user_level' => 3,
                'is_aktif' => 'y',
            );

            $this->Auth_model->insert_register($data);
            $this->load->view('auth/create_password', $data);
        } else {
            $this->session->set_flashdata('status_register', 'Email sudah terdaftar');
            redirect('auth/register');
        }
    }

    function create_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $kontak = $this->input->post('kontak', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $data = array(
            'password' => $hashPassword,
        );

        $this->Auth_model->create_password($username, $kontak, $data);
        $this->session->set_flashdata('status_register', 'Berhasil mendaftar, Silahkan login.');
        redirect('auth');
    }
}
