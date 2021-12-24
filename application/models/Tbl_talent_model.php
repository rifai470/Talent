<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_talent_model extends CI_Model
{

    public $table = 'tbl_talent';
    public $id = 'id_talent';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_talent,nama,nama_panggilan,tempat,tanggal_lahir,usia,jenis_kelamin,hobby,pendidikan,pekerjaan,bahasa,tinggi_badan,berat_badan,id_kategori,tentang,id_tarif,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_talent');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('tbl_talent/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
                ".anchor(site_url('tbl_talent/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_talent');
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
    function total_rows($q = NULL) {
        $this->db->like('id_talent', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nama_panggilan', $q);
	$this->db->or_like('tempat', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('usia', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('hobby', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('bahasa', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('tentang', $q);
	$this->db->or_like('id_tarif', $q);
	$this->db->or_like('SecLogUser', $q);
	$this->db->or_like('SecLogDate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_talent', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nama_panggilan', $q);
	$this->db->or_like('tempat', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('usia', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('hobby', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('bahasa', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('tentang', $q);
	$this->db->or_like('id_tarif', $q);
	$this->db->or_like('SecLogUser', $q);
	$this->db->or_like('SecLogDate', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    
    {
        $this->db->insert($this->table, $data);
        
    }

    //buat function insert sosmed
    function insert_sosmed($data_sosmed)
    
    {
        $this->db->insert('tbl_sosmed', $data_sosmed);
        
    }

    //buat function insert prestasi
    function insert_prestasi($prestasi_array)
    
    {
        $this->db->insert_batch('tbl_prestasi', $prestasi_array);
        
    }

    //buat function insert photo
    function insert_photo($data_photo)
    
    {
        $this->db->insert('tbl_photo', $data_photo);
        
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

    function cek_code()
    {
        $this->db->select("SUBSTR(code_talent,5) as code", FALSE);
        $this->db->order_by("code","DESC");
        $this->db->limit(1);
        $query = $this->db->get($this->table);
        
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $code = intval($data->code) +1;
        }  else {
            $code = 1;
        }
        return $code;
    }

}

/* End of file Tbl_talent_model.php */