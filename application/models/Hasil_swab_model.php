<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil_swab_model extends CI_Model
{

    public $table = 'hasil_swab';
    public $id = 'hasil_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {        
        if($this->session->userdata('perusahaan') == NULL && $this->session->userdata('id_user_level') != 3) {
            $this->datatables->select('hasil_swab.hasil_id,
            hasil_swab.no_rekam_medis,
            hasil_swab.jenis_pemeriksaan,
            hasil_swab.suhu,
            hasil_swab.saturasi,
            hasil_swab.swab_antigen,
            hasil_swab.tgl_periksa,
            hasil_swab.id_klinik,
            jenis_pemeriksaan.jenis_pemeriksaan,
            pasien.nama_lengkap,
            pasien.ktp,
            pasien.tgl_lahir,
            pasien.jenis_kelamin,
            pasien.alamat,
            pasien.email,
            pasien.phone,
            pasien.perusahaan,
            klinik.nama_klinik,
            klinik.alamat_klinik,
            klinik.phone,
            klinik.other_phone,
            klinik.fax,
            dokter.nama_dokter');
            $this->datatables->from('hasil_swab');
            //add this line for join
            $this->datatables->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
            $this->datatables->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
            $this->datatables->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
            $this->datatables->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
        } elseif ($this->session->userdata('id_user_level') == 3) {
            $this->datatables->select('hasil_swab.hasil_id,
            hasil_swab.no_rekam_medis,
            hasil_swab.jenis_pemeriksaan,
            hasil_swab.suhu,
            hasil_swab.saturasi,
            hasil_swab.swab_antigen,
            hasil_swab.tgl_periksa,
            hasil_swab.id_klinik,
            jenis_pemeriksaan.jenis_pemeriksaan,
            pasien.nama_lengkap,
            pasien.ktp,
            pasien.tgl_lahir,
            pasien.jenis_kelamin,
            pasien.alamat,
            pasien.email,
            pasien.phone,
            pasien.perusahaan,
            klinik.nama_klinik,
            klinik.alamat_klinik,
            klinik.phone,
            klinik.other_phone,
            klinik.fax,
            dokter.nama_dokter');
            $this->datatables->from('hasil_swab');
            //add this line for join
            $this->datatables->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
            $this->datatables->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
            $this->datatables->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
            $this->datatables->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
            $this->datatables->where('hasil_swab.no_pasien', $this->session->userdata('no_pasien'));
        } else {
            $this->datatables->select('hasil_swab.hasil_id,
            hasil_swab.no_rekam_medis,
            hasil_swab.jenis_pemeriksaan,
            hasil_swab.suhu,
            hasil_swab.saturasi,
            hasil_swab.swab_antigen,
            hasil_swab.tgl_periksa,
            hasil_swab.id_klinik,
            jenis_pemeriksaan.jenis_pemeriksaan,
            pasien.nama_lengkap,
            pasien.ktp,
            pasien.tgl_lahir,
            pasien.jenis_kelamin,
            pasien.alamat,
            pasien.email,
            pasien.phone,
            pasien.perusahaan,
            klinik.nama_klinik,
            klinik.alamat_klinik,
            klinik.phone,
            klinik.other_phone,
            klinik.fax,
            dokter.nama_dokter');
            $this->datatables->from('hasil_swab');
            //add this line for join
            $this->datatables->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
            $this->datatables->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
            $this->datatables->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
            $this->datatables->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
            $this->datatables->where('pasien.perusahaan', $this->session->userdata('perusahaan'));
        }
        // $this->datatables->add_column('action', anchor(site_url('hasil_swab/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
        //     ".anchor(site_url('hasil_swab/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
        //         ".anchor(site_url('hasil_swab/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'hasil_id');
        $this->datatables->add_column('action', anchor(site_url('hasil_swab/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i> Detail', array('class' => 'btn btn-success btn-sm')) . " 
        " . anchor(site_url('hasil_swab/pdf/$1'), '<i class="fa fa-print" aria-hidden="true"></i> Print', array('class' => 'btn btn-danger btn-sm')), 'hasil_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('hasil_swab.hasil_id,
        hasil_swab.no_rekam_medis,
        hasil_swab.suhu,
        hasil_swab.saturasi,
        hasil_swab.swab_antigen,
        hasil_swab.tgl_periksa,
        hasil_swab.id_klinik,
        jenis_pemeriksaan.jenis_pemeriksaan,
        pasien.nama_lengkap,
        pasien.ktp,
        pasien.tgl_lahir,
        pasien.jenis_kelamin,
        pasien.alamat,
        pasien.email,
        pasien.phone,
        pasien.perusahaan,
        klinik.nama_klinik,
        klinik.alamat_klinik,
        klinik.phone,
        klinik.other_phone,
        klinik.fax,
        dokter.nama_dokter', FALSE);
        $this->db->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
        $this->db->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
        $this->db->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
        $this->db->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
        $this->db->order_by($this->id, 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('hasil_swab.hasil_id,
        hasil_swab.no_rekam_medis,
        hasil_swab.jenis_pemeriksaan,
        hasil_swab.suhu,
        hasil_swab.saturasi,
        hasil_swab.swab_antigen,
        hasil_swab.tgl_periksa,
        hasil_swab.id_klinik,
        jenis_pemeriksaan.jenis_pemeriksaan,
        jenis_pemeriksaan.id_jenis_pemeriksaan,
        pasien.nama_lengkap,
        pasien.ktp,
        pasien.tgl_lahir,
        pasien.jenis_kelamin,
        pasien.alamat,
        pasien.email,
        pasien.phone,
        pasien.perusahaan,
        pasien.no_pasien,
        klinik.nama_klinik,
        klinik.alamat_klinik,
        klinik.phone,
        klinik.other_phone,
        klinik.fax,
        klinik.image_klinik,
        klinik.kota,
        klinik.provinsi,
        dokter.nama_dokter,
        dokter.image_ttd', FALSE);
        $this->db->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
        $this->db->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
        $this->db->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
        $this->db->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');
        $this->db->where('hasil_swab.hasil_id', $id);
        return $this->db->get('hasil_swab')->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('hasil_id', $q);
        $this->db->or_like('no_rekam_medis', $q);
        $this->db->or_like('jenis_pemeriksaan', $q);
        $this->db->or_like('suhu', $q);
        $this->db->or_like('saturasi', $q);
        $this->db->or_like('swab_antigen', $q);
        $this->db->or_like('tgl_periksa', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('hasil_id', $q);
        $this->db->or_like('no_rekam_medis', $q);
        $this->db->or_like('jenis_pemeriksaan', $q);
        $this->db->or_like('suhu', $q);
        $this->db->or_like('saturasi', $q);
        $this->db->or_like('swab_antigen', $q);
        $this->db->or_like('tgl_periksa', $q);
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
        $this->db->select('CAST(SUBSTR(no_rekam_medis,9) AS UNSIGNED) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('hasil_swab');
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

    public function get_kode_pemeriksaan($jenis_pemeriksaan)
    {
        $this->db->select('kode_jenis_pemeriksaan', FALSE);
        $this->db->where('id_jenis_pemeriksaan', $jenis_pemeriksaan);
        $query = $this->db->get('jenis_pemeriksaan')->row();
        $data = $query->kode_jenis_pemeriksaan;
        return $data;
    }

    function json_detail()
    {
        $this->datatables->select('hasil_swab.hasil_id,
        hasil_swab.no_rekam_medis,
        hasil_swab.jenis_pemeriksaan,
        hasil_swab.suhu,
        hasil_swab.saturasi,
        hasil_swab.swab_antigen,
        hasil_swab.tgl_periksa,
        hasil_swab.id_klinik,
        jenis_pemeriksaan.jenis_pemeriksaan,
        pasien.nama_lengkap,
        pasien.ktp,
        pasien.tgl_lahir,
        pasien.jenis_kelamin,
        pasien.alamat,
        pasien.email,
        pasien.phone,
        pasien.perusahaan,
        klinik.nama_klinik,
        klinik.alamat_klinik,
        klinik.phone,
        klinik.other_phone,
        klinik.fax,
        dokter.nama_dokter');
        $this->datatables->from('hasil_swab');
        //add this line for join
        $this->datatables->join('pasien', 'hasil_swab.no_pasien = pasien.no_pasien', 'left');
        $this->datatables->join('jenis_pemeriksaan', 'hasil_swab.jenis_pemeriksaan = jenis_pemeriksaan.id_jenis_pemeriksaan', 'left');
        $this->datatables->join('klinik', 'hasil_swab.id_klinik = klinik.id_klinik', 'left');
        $this->datatables->join('dokter', 'klinik.id_dokter = dokter.id_dokter', 'left');

        // $this->datatables->add_column('action', anchor(site_url('hasil_swab/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
        //     ".anchor(site_url('hasil_swab/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
        //         ".anchor(site_url('hasil_swab/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'hasil_id');
        $this->datatables->add_column('action', anchor(site_url('hasil_swab_detail/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i> Detail', array('class' => 'btn btn-success btn-sm')) . " 
        " . anchor(site_url('hasil_swab_detail/pdf/$1'), '<i class="fa fa-print" aria-hidden="true"></i> Print', array('class' => 'btn btn-danger btn-sm')), 'hasil_id');
        return $this->datatables->generate();
    }
}

/* End of file Hasil_swab_model.php */