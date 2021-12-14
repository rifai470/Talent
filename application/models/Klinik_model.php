<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klinik_model extends CI_Model
{

    public $table = 'klinik';
    public $id = 'id_klinik';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('klinik.id_klinik, klinik.nama_klinik, klinik.alamat_klinik, klinik.phone, klinik.other_phone, klinik.fax, klinik.id_dokter, klinik.image_klinik, dokter.nama_dokter, dokter.image_ttd');
        $this->datatables->from('klinik');
        //add this line for join
        $this->datatables->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
        $this->datatables->add_column('action', anchor(site_url('klinik/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('klinik/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
                ".anchor(site_url('klinik/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_klinik');
        // $this->datatables->add_column('action', anchor(site_url('klinik/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i> Detail', array('class' => 'btn btn-success btn-sm'))." 
        //         ".anchor(site_url('klinik/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i> Delete','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_klinik');
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
        $this->db->select('klinik.id_klinik, klinik.nama_klinik, klinik.alamat_klinik, klinik.phone, klinik.other_phone, klinik.fax, klinik.id_dokter, klinik.image_klinik, dokter.nama_dokter, dokter.image_ttd,klinik.kota, klinik.provinsi', FALSE);
        $this->db->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_klinik', $q);
	$this->db->or_like('nama_klinik', $q);
	$this->db->or_like('alamat_klinik', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('other_phone', $q);
	$this->db->or_like('fax', $q);
	$this->db->or_like('id_dokter', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_klinik', $q);
	$this->db->or_like('nama_klinik', $q);
	$this->db->or_like('alamat_klinik', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('other_phone', $q);
	$this->db->or_like('fax', $q);
	$this->db->or_like('id_dokter', $q);
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

    function get_provinsi($kota)
    {
        $this->db->select('provinsi.nama_provinsi', FALSE);
        $this->db->from('kota');
        $this->db->where('nama_kota', $kota);
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left');
        $this->db->order_by('provinsi.id_provinsi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

}

/* End of file Klinik_model.php */