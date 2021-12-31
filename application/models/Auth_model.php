<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    private $table = "tbl_user";
    private $pk = "id_users";
    public function __construct()
    {
        parent::__construct();
    }
    // ambil data dari database yang usernamenya $username dan passwordnya p$assword

    // public function login($username, $passwordVerify)
    public function login($username)
    {
        $this->db->select('tbl_user.id_users,
                tbl_user.username,
                tbl_user.password,
                tbl_user.id_user_level,
                tbl_user.is_aktif,
                tbl_user.cookie,
                tbl_user.nama_lengkap,
                tbl_user.perusahaan,
                tbl_user.images,
                tbl_user_level.nama_level,
                tbl_user.kontak');
        $this->db->where('tbl_user.username', $username);
        $this->db->join('tbl_user_level', 'tbl_user.id_user_level = tbl_user_level.id_user_level', 'left');
        $query = $this->db->get('tbl_user');
        $data = $query->row();
        return $data;
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // exit;
    }

    // update user
    public function update($data, $id_users)
    {
        $this->db->where($this->pk, $id_users);
        $this->db->update($this->table, $data);
    }
    // ambil data berdasarkan cookie
    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get($this->table);
    }

    function insert_register($data)
    {
        $this->db->insert('tbl_user', $data);
        return $this->db->insert_id();
    }

    function cek_user($id)
    {
        $this->db->where('id_users', $id);
        $data = $this->db->get('tbl_user')->row_array();
        return $data;
    }

    function activate($data, $id)
    {
        $this->db->where('id_users', $id);
        return $this->db->update('tbl_user', $data);
    }
}
