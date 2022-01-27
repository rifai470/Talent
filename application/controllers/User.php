<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->helper(array('Form', 'Cookie', 'String'));
    }

    public function index()
    {
        $this->template->load('template', 'user/tbl_user_list');
    }

    public function json_nonactive()
    {
        header('Content-Type: application/json');
        echo $this->User_model->json_nonactive();
    }

    public function json_reactive()
    {
        header('Content-Type: application/json');
        echo $this->User_model->json_reactive();
    }

    public function read($id)
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_users'      => $row->id_users,
                'first_name'     => $row->first_name,
                'last_name'     => $row->last_name,
                'email'         => $row->email,
                'password'      => $row->password,
                'images'        => $row->images,
                'id_user_level' => $row->id_user_level,
                'is_aktif'      => $row->is_aktif,
            );
            $this->template->load('template', 'user/tbl_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('user/create_action'),
            'id_users' => set_value('id_users'),
            'username' => set_value('username'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'password' => set_value('password'),
            'id_user_level' => set_value('id_user_level'),
            'is_aktif' => set_value('is_aktif'),
            'perusahaan' => set_value('perusahaan'),
            'kontak' => set_value('kontak'),
        );
        $this->template->load('template', 'user/tbl_user_form', $data);
    }


    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password', TRUE);
            $options        = array("cost" => 4);
            $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);

            $data = array(
                'nama_lengkap'     => $this->input->post('nama_lengkap', TRUE),
                'username'      => $this->input->post('username', TRUE),
                'password'      => $hashPassword,
                'id_user_level' => $this->input->post('id_user_level', TRUE),
                'kontak'        => $this->input->post('kontak', TRUE),
                'perusahaan'    => $this->input->post('perusahaan', TRUE),
                'is_aktif'      => $this->input->post('is_aktif', TRUE),
            );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }

    public function update($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('user/update_action'),
                'id_users'      => set_value('id_users', $row->id_users),
                'nama_lengkap'  => set_value('nama_lengkap', $row->nama_lengkap),
                'kontak'        => set_value('kontak', $row->kontak),
                'username'      => set_value('username', $row->username),
                'password'      => set_value('password', $row->password),
                'id_user_level' => set_value('id_user_level', $row->id_user_level),
                'is_aktif'      => set_value('is_aktif', $row->is_aktif),
                'perusahaan'    => set_value('perusahaan', $row->perusahaan),
            );
            $this->template->load('template', 'user/tbl_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            $data = array(
                'id_users'      => $this->input->post('id_users', TRUE),
                'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
                'kontak'        => $this->input->post('kontak', TRUE),
                'username'      => $this->input->post('username', TRUE),
                'password'      => $this->input->post('password', TRUE),
                'id_user_level' => $this->input->post('id_user_level', TRUE),
                'is_aktif'      => $this->input->post('is_aktif', TRUE),
                'perusahaan'    => $this->input->post('perusahaan', TRUE),
            );

            $this->User_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }


    function upload_foto()
    {
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }

    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('email', 'email', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
        $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

        $this->form_validation->set_rules('id_users', 'id_users', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_user.xls";
        $judul = "tbl_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "First Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");
        xlsWriteLabel($tablehead, $kolomhead++, "Images");
        xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
        xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

        foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
            xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->password);
            xlsWriteLabel($tablebody, $kolombody++, $data->images);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
            xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_user.doc");

        $data = array(
            'tbl_user_data' => $this->User_model->get_all(),
            'start' => 0
        );

        $this->load->view('user/tbl_user_doc', $data);
    }

    // function get_email()
    // {
    //     $id_pasien = $this->input->post('id', TRUE);
    //     $data = $this->User_model->get_email($id_pasien)->result();
    //     echo json_encode($data);
    // }

    function profile($id)
    {
        $row = $this->User_model->get_by_id($id);
        $data = array(
            'id_users' => $row->id_users,
            'username' => $row->username,
            'nama_lengkap' => $row->nama_lengkap,
            'kontak' => $row->kontak,
            'images' => set_value('images', $row->images),
            'perusahaan' => set_value('perusahaan', $row->perusahaan),
        ); 
        $this->load->view('user/profile', $data);
    }

    function change_profile()
    {
        $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
        $kontak = $this->input->post('kontak', TRUE);
        // $username = $this->input->post('username', TRUE);
        $perusahaan = $this->input->post('perusahaan', TRUE);

        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'kontak' => $kontak,
            // 'username' => $username,
            'perusahaan' => $perusahaan,
        );

        $this->User_model->update($this->input->post('id_users', TRUE), $data);
        $this->session->set_flashdata('message_r', 'Ubah profile berhasil');
        redirect(site_url('user/profile/'.$this->input->post('id_users', TRUE).''));
    }

    function change_password()
    {
        $current_password = $this->input->post('password', TRUE);
        $new_password = $this->input->post('new_password', TRUE);

        $row = $this->User_model->login($this->input->post('id_users', TRUE));
        if ($row) {
            $userPassword = $row->password;
            if (password_verify($current_password, $userPassword)) {
                $options        = array("cost" => 4);
                $hashPassword   = password_hash($new_password, PASSWORD_BCRYPT, $options);
                $data = array(
                    'password' => $hashPassword,
                );

                $this->User_model->update($this->input->post('id_users', TRUE), $data);
                delete_cookie('talent');
                $this->session->sess_destroy();
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', 'Current password salah');
                if($this->input->post('change_password', TRUE) == 1){
                    redirect(site_url('user/profile/'.$this->input->post('id_users', TRUE).''));
                } else {
                    redirect(site_url('tbl_talent/profile_talent/'.$this->input->post('id_users', TRUE).''));
                }
                
            }
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            if($this->input->post('change_password', TRUE) == 1){
                redirect(site_url('user/profile/'.$this->input->post('id_users', TRUE).''));
            } else {
                redirect(site_url('tbl_talent/profile_talent/'.$this->input->post('id_users', TRUE).''));
            }
        }

        
    }

    public function nonactive($id)
	{
		$data = array(
			'is_aktif' => 'n',
		);
		// print_r($data);
		// die;

		$this->User_model->update($id, $data);
		
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('user'));
	}

    public function reactive($id)
	{
		$data = array(
			'is_aktif' => 'y',
		);
		// print_r($data);
		// die;

		$this->User_model->update($id, $data);
		
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('user'));
	}
}