<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sosmed_model extends CI_Model
{

    public $table = 'tbl_sosmed';
    public $id = 'id_sosmed';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_sosmed,instagram,facebook,twitter,tiktok,youtube,other,code_talent,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_sosmed');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_sosmed.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_sosmed/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')),'id_sosmed');
            
              
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
        $this->db->like('id_sosmed', $q);
	$this->db->or_like('instagram', $q);
	$this->db->or_like('facebook', $q);
    $this->db->or_like('twitter', $q);
	$this->db->or_like('tiktok', $q);
    $this->db->or_like('youtube', $q);
	$this->db->or_like('other', $q);
	$this->db->or_like('code_talent', $q);
	$this->db->or_like('SecLogUser', $q);
	$this->db->or_like('SecLogDate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_sosmed', $q);
	$this->db->or_like('instagram', $q);
	$this->db->or_like('facebook', $q);
    $this->db->or_like('twitter', $q);
	$this->db->or_like('tiktok', $q);
    $this->db->or_like('youtube', $q);
	$this->db->or_like('other', $q);
	$this->db->or_like('code_talent', $q);
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

/* End of file Tbl_sosmed_model.php */