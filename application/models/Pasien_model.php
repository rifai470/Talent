<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pasien.id_pasien, pasien.nama_lengkap, pasien.ktp, pasien.tgl_lahir, pasien.jenis_kelamin, pasien.alamat, pasien.email, pasien.no_pasien, pasien.phone, pasien.perusahaan, pasien.images, COUNT(hasil_swab.hasil_id) as hasil');
        $this->datatables->from('pasien');
        //add this line for join
        $this->datatables->join('hasil_swab', 'pasien.no_pasien = hasil_swab.no_pasien', 'left');
        $this->datatables->group_by('pasien.id_pasien');
        $this->datatables->add_column('action', anchor(site_url('pasien/create_hasil_swab/$1'),'<i class="fa fa-plus" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm','data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Create Hasil Swab'))." ".anchor(site_url('pasien/update_hasil_swab/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm','data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Update Hasil Swab'))." ".anchor(site_url('pasien/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm','data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Update Pasien'))."  ".anchor(site_url('pasien/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete Pasien" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pasien');
        $this->datatables->add_column('hasil', "$1",'hasil');
        // $this->datatables->add_column('action', anchor(site_url('pasien/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i> Detail', array('class' => 'btn btn-success btn-sm'))." 
        //         ".anchor(site_url('pasien/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i> Delete','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pasien');
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
        $this->db->like('id_pasien', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_pasien', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('images', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pasien', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_pasien', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('images', $q);
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

    public function buat_kode()
    {
        $this->db->select('CAST(SUBSTR(no_pasien,7) AS UNSIGNED) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($kode);
        // exit;
    }

    public function get_pasien($no_pasien)
    {
        $this->db->select('id_pasien', FALSE);
        $this->db->where('no_pasien', $no_pasien);
        $query = $this->db->get('pasien');
        $data = $query->row();
        return $data;
    }

    public function check_pasien($ktp, $phone)
    {
        $data_ktp = array($ktp);
        $data_phone = array($phone);
        $this->db->where_in('ktp', $data_ktp);
        $this->db->where_in('phone', $data_phone);
        $data = $this->db->get('pasien');

        return $data->row();
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // exit;
    }

    public function insert_batch($dataPasien)
    {
        $this->db->insert_batch('pasien', $dataPasien);

        return $this->db->affected_rows();
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // exit;
    }

    function insert_user($dataUser)
    {
        $this->db->insert('tbl_user', $dataUser);
    }

    public function get_pasien_import($noPasien)
    {
        $this->db->select('id_pasien, email', FALSE);
        $this->db->where_in('no_pasien', $noPasien);
        $query = $this->db->get('pasien');
        $data = $query->result_array();
        return $data;
    }

    function insert_user_import($userArray)
    {
        $this->db->insert_batch('tbl_user', $userArray);
    }

    function insert_hasilSwab($dataSwab)
    {
        $this->db->insert('hasil_swab', $dataSwab);
    }

    function update_hasilSwab($hasil_id, $dataSwab)
    {
        $this->db->where('hasil_id', $hasil_id);
        $this->db->update('hasil_swab', $dataSwab);
    }

    public function get_hasilSwab($id)
    {
        $this->db->select('hasil_swab.jenis_pemeriksaan,
        hasil_swab.suhu,
        hasil_swab.saturasi,
        hasil_swab.swab_antigen,
        hasil_swab.tgl_periksa,
        hasil_swab.id_klinik,
        hasil_swab.hasil_id,
        hasil_swab.no_rekam_medis', FALSE);
        $this->db->join('hasil_swab', 'pasien.no_pasien = hasil_swab.no_pasien', 'left');
        $this->db->where('pasien.id_pasien', $id);
        $query = $this->db->get('pasien');
        $data = $query->row();
        return $data;
    }
}

/* End of file Pasien_model.php */