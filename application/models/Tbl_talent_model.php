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
    function json()
    {
        $this->datatables->select('id_talent,nama,nama_panggilan,tempat,tanggal_lahir,usia,jenis_kelamin,hobby,pendidikan,pekerjaan,bahasa,tinggi_badan,berat_badan,id_kategori,tentang,id_tarif,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_talent');
        $this->datatables->where('status','active');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')) . " 
            " . anchor(site_url('tbl_talent/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
                " . anchor(site_url('tbl_talent/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_talent');
        return $this->datatables->generate();
    }

    function json_verify()
    {
        $this->datatables->select('id_talent,nama,nama_panggilan,tempat,tanggal_lahir,usia,jenis_kelamin,hobby,pendidikan,pekerjaan,bahasa,tinggi_badan,berat_badan,id_kategori,tentang,id_tarif,status,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_talent');
        $this->datatables->where('status','inactive');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
            " . anchor(site_url('tbl_talent_verify/approve/$1'), '<i class="fas fa-thumbs-up" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')) . " 
                " . anchor(site_url('tbl_talent_verify/reject/$1'), '<i class="fas fa-thumbs-down" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"'), 'id_talent');
        return $this->datatables->generate();
    }

    function json_rejected()
    {
        $this->datatables->select('id_talent,nama,nama_panggilan,tempat,tanggal_lahir,usia,jenis_kelamin,hobby,pendidikan,pekerjaan,bahasa,tinggi_badan,berat_badan,id_kategori,tentang,id_tarif,status,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_talent');
        $this->datatables->where('status','rejected');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
            " . anchor(site_url('tbl_talent_verify/follow_up/$1'), '<i class="fas fa-arrow-up" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')),'id_talent');
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
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*, tbl_tarif.*, tbl_prestasi.*, tbl_sosmed.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_tarif', 'tbl_talent.id_tarif=tbl_tarif.id_tarif', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->where('tbl_talent.id_talent', $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
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
        $this->db->or_like('status', $q);
        $this->db->or_like('prestasi', $q);
        $this->db->or_like('sosmed', $q);
         $this->db->or_like('sosmed', $q);
        $this->db->or_like('SecLogUser', $q);
        $this->db->or_like('SecLogDate', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
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
        $this->db->or_like('status', $q);
        $this->db->or_like('prestasi', $q);
        $this->db->or_like('sosmed', $q);
        $this->db->or_like('SecLogUser', $q);
        $this->db->or_like('SecLogDate', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    //buat function insert sosmed
    function insert_sosmed($data_sosmed)
    {
        $this->db->insert('tbl_sosmed', $data_sosmed);
    }

    //buat function insert tags
    function insert_tags_label($tagsArray)
    {
        $this->db->insert_batch('tbl_tags_label', $tagsArray);
    }

    function insert_tags($data_tags)
    {
        $this->db->insert_batch('tbl_tags', $data_tags);
    }

    //buat function insert prestasi
    function insert_prestasi($prestasi_array)
    {
        $this->db->insert('tbl_prestasi', $prestasi_array);
    }

    //buat function insert photo
    function insert_photo($data_photo)
    {
        $this->db->insert_batch('tbl_photo', $data_photo);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_prestasi($code_talent, $data_update_prestasi)
    {
        $this->db->where('code_talent', $code_talent);
        $this->db->update('tbl_prestasi', $data_update_prestasi);
    }

    function update_sosmed($code_talent, $data_update_sosmed)
    {
        $this->db->where('code_talent', $code_talent);
        $this->db->update('tbl_sosmed', $data_update_sosmed);
    }

    function update_tags($code_talent, $data_update_tags)
    {
        $this->db->where('code_talent', $code_talent);
        $this->db->update('tbl_tags', $data_update_tags);
    }

    function update_photo($code_talent, $data_update_photo)
    {
        $this->db->where('code_talent', $code_talent);
        $this->db->update('tbl_photo', $data_update_photo);
    }


    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function cek_code()
    {
        $this->db->select("CAST(SUBSTR(code_talent,5) as INT) as code", FALSE);
        $this->db->order_by("code", "DESC");
        $this->db->limit(1);
        $query = $this->db->get($this->table);

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $code = intval($data->code) + 1;
        } else {
            $code = 1;
        }
        return $code;
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // print_r($code);
        // exit;
    }

    function get_kategori_talent($id_kategori)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*, tbl_tarif.*,tbl_sosmed.*,tbl_prestasi.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_tarif', 'tbl_talent.id_tarif=tbl_tarif.id_tarif', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.id_kategori', $id_kategori);
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->result();
    }

    function get_by_code_talent($code_talent)
    {
        // $this->db->where($this->id, $id);
        // return $this->db->get($this->table)->row();
        $this->db->select('tbl_talent.*, tbl_photo.photo, tbl_kategori.*, tbl_tarif.*, tbl_prestasi.*, tbl_sosmed.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_tarif', 'tbl_talent.id_tarif=tbl_tarif.id_tarif', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->where('tbl_talent.code_talent', $code_talent);
        return $this->db->get('tbl_talent')->result();
    }

    function get_by_id_user($id_user)
    {
        $this->db->select('tbl_talent.*, tbl_user.*');
        $this->db->join('tbl_user', 'tbl_talent.id_users=tbl_user.id_users', 'left');
        $this->db->where('tbl_talent.id_users', $id_user);
        return $this->db->get('tbl_talent')->result();
    }

    function get_tags()
    {
        $this->db->select('tags', FALSE);
        $this->db->group_by('tags');
        $data = $this->db->get('tbl_tags')->result_array();
        return $data;
    }

    function get_tags_array()
    {
        $this->db->select('tags', FALSE);
        $this->db->group_by('tags');
        $data = $this->db->get('tbl_tags')->result_array();
        $index = 0;
        foreach ($data as $tag) {
            $tagsRow[$index] = $tag['tags'];
            $index++;
        }
        return $tagsRow;
    }

    function get_id_tags($tagss)
    {
        $this->db->select('id_tags,tags', FALSE);
        $this->db->where_in('tags', $tagss);
        $data = $this->db->get('tbl_tags')->result();
        return $data;
    }

    function image($code_talent)
    {
        $this->db->select('id_photo, photo, code_talent');
        $this->db->where_in('code_talent', $code_talent);
        return $this->db->get('tbl_photo')->result();


        //  print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // exit;
    }

    function get_tags_label()
    {
        $this->db->select('tbl_tags_label.rel_id,
        tbl_tags_label.rel_type,
        tbl_tags_label.id_tags,
        tbl_tags_label.tag_order,
        tbl_tags.tags', FALSE);
        $this->db->join('tbl_tags','tbl_tags_label.id_tags = tbl_tags.id_tags','left');
        $this->db->order_by('tbl_tags_label.tag_order', 'ASC');
        $data = $this->db->get('tbl_tags_label')->result();
        return $data;
    }

    function get_email($id)
    {
        $this->db->select('tbl_talent.*,tbl_user.*');
        $this->db->join('tbl_user', 'tbl_talent.id_users=tbl_user.id_users', 'left');
        $this->db->where('tbl_talent.id_talent', $id);
        return $this->db->get('tbl_talent')->row();
    }
}

/* End of file Tbl_talent_model.php */