<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokter_model extends CI_Model
{

    public $table = 'dokter';
    public $id = 'id_dokter';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_dokter,nama_dokter, image_ttd');
        $this->datatables->from('dokter');
        //add this line for join
        //$this->datatables->join('table2', 'dokter.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('dokter/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('dokter/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
                ".anchor(site_url('dokter/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_dokter');
        // $this->datatables->add_column('action', anchor(site_url('dokter/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i> Detail', array('class' => 'btn btn-success btn-sm'))." 
        //         ".anchor(site_url('dokter/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i> Delete','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_dokter');
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
        $this->db->like('id_dokter', $q);
	$this->db->or_like('nama_dokter', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_dokter', $q);
	$this->db->or_like('nama_dokter', $q);
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

}

/* End of file Dokter_model.php */