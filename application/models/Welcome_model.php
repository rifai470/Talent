<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all()
    {
        $this->db->select('tbl_talent.nama, tbl_talent.tempat, tbl_photo.photo, tbl_kategori.kategori, tbl_tarif.tarif from tbl_talent
        left join tbl_photo on tbl_talent.code_talent=tbl_photo.code_talent  
        left join tbl_kategori on tbl_talent.id_kategori=tbl_kategori.id_kategori
        left join tbl_tarif on tbl_talent.id_tarif=tbl_tarif.id_tarif');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
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
}
