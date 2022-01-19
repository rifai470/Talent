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
            if ($row->is_aktif == 'y') {
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
                $this->session->set_flashdata('status_login', 'Akun tidak aktif, Mohon verifikasi terlebih dahulu.');
                $this->index();
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
        if ($row->id_user_level == 1 || $row->id_user_level == 2) {
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
            'user_level' => set_value('user_level'),
            'message' => $this->session->flashdata('message'),
        );
        $this->load->view('auth/register', $data);
    }

    function register_action()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('status_register', 'Email atau Password salah');
            redirect('auth/register');
        } else {
            $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
            $kontak = $this->input->post('kontak', TRUE);
            $username = $this->input->post('username', TRUE);
            $row = $this->Auth_model->login($username);
            $password = $this->input->post('password', TRUE);
            $options = array("cost" => 4);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $user_level = $this->input->post('user_level', TRUE);

            // print_r($user_level);
            // die;

            //generate simple random code
            $set = str_replace(" ","",$nama_lengkap).trim($kontak)."TalentManagement"."MustikaRatu";
			$code = substr(str_shuffle($set), 0, 24);

            if (empty($row->username)) {
                $data = array(
                    'nama_lengkap' => trim($nama_lengkap),
                    'kontak' => trim($kontak),
                    'username' => trim($username),
                    'password' => $hashPassword,
                    'id_user_level' => $user_level,
                    'is_aktif' => 'n',
                    'code' => $code
                );

                $id = $this->Auth_model->insert_register($data);
                $this->send_activation($data, $id);
                $this->session->set_flashdata('status_register', 'Berhasil mendaftar, Silahkan cek email untuk verifikasi.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('status_register', 'Email sudah terdaftar');
                redirect('auth/register');
            }
        }
    }

    public function activate()
    {
        $id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

        $user = $this->Auth_model->cek_user($id);

		if ($user['code'] == $code) {
			$data['is_aktif'] = 'y';
			$query = $this->Auth_model->activate($data, $id);

			if ($query) {
				$this->session->set_flashdata('status_register', 'User activated successfully');
			} else {
				$this->session->set_flashdata('status_login', 'Something went wrong in activating account');
			}
		} else {
			$this->session->set_flashdata('status_login', 'Cannot activate account. Code didnt match');
		}
		redirect('auth');
    }

    public function send_activation($data, $id)
	{
		//Load data
        $mail = $data['username'];

		$message = "
        <html>
        <head>
            <title>Verification Code</title>
        </head>
        <body>
            <h2>Thank you for Registering Mustika Ratu Talent Account.</h2>
            <p>Please click the link below to activate your account.</p>
            <h4><a href='" . base_url() . "auth/activate/" . $id . "/" . $data['code'] . "'>Activate My Account</a></h4>
        </body>
        </html>
        ";

		//Send Email
		$config['protocol'] = 'smtp';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'mustikaratu.mailer@gmail.com';
		$config['smtp_pass'] = 'mustikagoogle@2022';
		$config['mailtype'] = 'html';

		$this->load->library('email', $config);

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from('mustikaratu.mailer@gmail.com', 'Mustika Ratu Talent');
		$this->email->to($mail);
		$this->email->subject('Signup Verification Email');
		$this->email->message($message);

		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "Error in sending Email.");
			// show_error($this->email->print_debugger());
		}
	}
}
