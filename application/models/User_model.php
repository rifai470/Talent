<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'tbl_user';
    public $id = 'id_users';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('tbl_user.id_users,
                            tbl_user_level.nama_level,
                            tbl_user.is_aktif,
                            tbl_user.username,
                            pasien.nama_lengkap
                            
        ');
        $this->datatables->from('tbl_user');
        $this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        $this->datatables->join('tbl_user_level', 'tbl_user.id_user_level = tbl_user_level.id_user_level', 'left');
        $this->datatables->join('pasien', 'tbl_user.id_pasien = pasien.id_pasien', 'left');
        $this->datatables->add_column('action', anchor(site_url('user/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
                " . anchor(site_url('user/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_users', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('images', $q);
        $this->db->or_like('id_user_level', $q);
        $this->db->or_like('is_aktif', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_users', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('images', $q);
        $this->db->or_like('id_user_level', $q);
        $this->db->or_like('is_aktif', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_email($id_pasien)
    {
        $this->db->select('pasien.email');
        $this->db->from('pasien');
        $this->db->where('id_pasien', $id_pasien);
        $query = $this->db->get();
        return $query;
    }

    function login($id_users)
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
        $this->db->where('tbl_user.id_users', $id_users);
        $this->db->join('tbl_user_level', 'tbl_user.id_user_level = tbl_user_level.id_user_level', 'left');
        $query = $this->db->get('tbl_user');
        $data = $query->row();
        return $data;
    }
}
