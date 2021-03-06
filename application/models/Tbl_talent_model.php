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
        $this->datatables->select('id_talent,nama,nama_panggilan,tempat,tanggal_lahir,usia,jenis_kelamin,hobby,pendidikan,pekerjaan,bahasa,tinggi_badan,berat_badan,id_kategori,tentang,tarif_minimum,tarif_maximum,rides,SecLogUser,SecLogDate');
        $this->datatables->from('tbl_talent');
        $this->datatables->where('status', 'active');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')) . " 
            " . anchor(site_url('tbl_talent/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
                " . anchor(site_url('tbl_talent/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_talent');
        return $this->datatables->generate();
    }

    function json_verify()
    {
        $this->datatables->select('tbl_talent.id_talent,tbl_talent.nama,tbl_talent.nama_panggilan,tbl_talent.tempat,tbl_talent.tanggal_lahir,tbl_talent.usia,tbl_talent.jenis_kelamin,tbl_talent.hobby,pendidikan,tbl_talent.pekerjaan,tbl_talent.bahasa,tbl_talent.tinggi_badan,tbl_talent.berat_badan,tbl_talent.id_kategori,tbl_talent.tentang,tbl_talent.tarif_minimum,tbl_talent.tarif_maximum,tbl_talent.rides,tbl_talent.status,tbl_talent.SecLogUser,tbl_talent.SecLogDate,tbl_kategori.kategori');
        $this->datatables->from('tbl_talent');
        $this->datatables->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->datatables->where('tbl_talent.status', 'inactive');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
        " . anchor(site_url('tbl_talent/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
            " . anchor(site_url('tbl_talent_verify/approve/$1'), '<i class="fas fa-thumbs-up" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')) . " 
                " . anchor(site_url('tbl_talent_verify/reject/$1'), '<i class="fas fa-thumbs-down" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"'), 'id_talent');
        return $this->datatables->generate();
    }

    function json_rejected()
    {
        $this->datatables->select('tbl_talent.id_talent,tbl_talent.nama,tbl_talent.nama_panggilan,tbl_talent.tempat,tbl_talent.tanggal_lahir,tbl_talent.usia,tbl_talent.jenis_kelamin,tbl_talent.hobby,pendidikan,tbl_talent.pekerjaan,tbl_talent.bahasa,tbl_talent.tinggi_badan,tbl_talent.berat_badan,tbl_talent.id_kategori,tbl_talent.tentang,tbl_talent.tarif_minimum,tbl_talent.tarif_maximum,tbl_talent.rides,tbl_talent.status,tbl_talent.SecLogUser,tbl_talent.SecLogDate,tbl_kategori.kategori');
        $this->datatables->from('tbl_talent');
        $this->datatables->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->datatables->where('tbl_talent.status', 'rejected');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_talent.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbl_talent/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . " 
        " . anchor(site_url('tbl_talent/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm')) . "     
        " . anchor(site_url('tbl_talent_verify/follow_up/$1'), '<i class="fas fa-arrow-up" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')), 'id_talent');
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
        $this->db->select('tbl_talent.id_talent,
        tbl_talent.id_users,
        tbl_talent.code_talent,
        tbl_talent.nama,
        tbl_talent.nama_panggilan,
        tbl_talent.tempat,
        tbl_talent.tanggal_lahir,
        tbl_talent.usia,
        tbl_talent.jenis_kelamin,
        tbl_talent.hobby,
        tbl_talent.pendidikan,
        tbl_talent.pekerjaan,
        tbl_talent.bahasa,
        tbl_talent.tinggi_badan,
        tbl_talent.berat_badan,
        tbl_talent.id_kategori,
        tbl_talent.tentang,
        tbl_talent.tarif_minimum,
        tbl_talent.tarif_maximum,
        tbl_talent.rides,
        tbl_talent.`status`,
        tbl_talent.SecLogUser,
        tbl_talent.SecLogDate,
        tbl_photo.id_photo,
        tbl_photo.photo,
        tbl_photo.SecLogUser,
        tbl_photo.SecLogDate,
        tbl_kategori.id_kategori,
        tbl_kategori.kategori,
        tbl_kategori.icon,
        tbl_prestasi.id_prestasi,
        tbl_prestasi.prestasi,
        tbl_prestasi.SecLogUser,
        tbl_prestasi.SecLogDate,
        tbl_banner.id_banner,
        tbl_banner.banner,
        tbl_banner.SecLogUser,
        tbl_banner.SecLogDate,
        tbl_sosmed.id_sosmed,
        tbl_sosmed.instagram,
        tbl_sosmed.facebook,
        tbl_sosmed.twitter,
        tbl_sosmed.tiktok,
        tbl_sosmed.youtube,
        tbl_sosmed.other,
        tbl_sosmed.SecLogUser,
        tbl_sosmed.SecLogDate');
        $this->db->join('tbl_banner', 'tbl_talent.code_talent=tbl_banner.code_talent', 'left');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
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
        $this->db->or_like('tarif_minimum', $q);
        $this->db->or_like('tarif_maximum', $q);
        $this->db->or_like('rides', $q);
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
        $this->db->or_like('tarif_minimum', $q);
        $this->db->or_like('tarif_maximum', $q);
        $this->db->or_like('rides', $q);
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

    function insert_endorse($data_endorse)
    {
        $this->db->insert('tbl_endorse', $data_endorse);
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
    //buat function insert banner
    function insert_banner($data_banner)
    {
        $this->db->insert('tbl_banner', $data_banner);
    }

    //buat function insert photo
    function insert_photo_endorse($data_photo_endorse)
    {
        $this->db->insert_batch('tbl_photo_endorse', $data_photo_endorse);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_banner($uploadData, $code_talent)
    {
        $this->db->where('code_talent', $code_talent);
        $this->db->update('tbl_banner', $uploadData);
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

    function delete_tags($id)
    {
        $this->db->where("rel_id", $id);
        $this->db->delete("tbl_tags_label");
    }

    function delete_photo($id)
    {
        $this->db->where("id_photo", $id);
        $data = $this->db->delete("tbl_photo");
        print_r($this->db->last_query());
        echo "<pre>";
        print_r($data);
        exit;
    }

    function delete_banner($id)
    {
        $this->db->where("id_banner", $id);
        $this->db->delete("tbl_banner");
    }

    function cek_code()
    {
        $this->db->select("CAST(SUBSTR(code_talent,5) as SIGNED) as code", FALSE);
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

    // function get_kategori_talent($id_kategori, $start, $limit){
    //     $query = $this->db->get('tbl_talent', $limit, $start);
    //     // return $query;
    //     print_r($this->db->last_query());
    //     echo "<pre>";
    //     print_r($query);
    //     // print_r($code);
    //     exit;
    // }

    function get_kategori_talent($id_kategori, $limit, $start)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*,tbl_sosmed.*,tbl_prestasi.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.id_kategori', $id_kategori);
        $this->db->where('tbl_talent.status', 'active');
        $this->db->limit($limit, $start);
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->result();
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // // print_r($code);
        // exit;
    }

    function get_kategori_talent_count($id_kategori)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*,tbl_sosmed.*,tbl_prestasi.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.id_kategori', $id_kategori);
        $this->db->where('tbl_talent.status', 'active');
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->result();
    }

    function get_search_talent($search, $limit, $start)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*,tbl_sosmed.*,tbl_prestasi.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.status', 'active');
        $this->db->like('tbl_talent.nama', $search, 'both');
        $this->db->limit($limit, $start);
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->result();
        // print_r($this->db->last_query());
        // echo "<pre>";
        // print_r($data);
        // // print_r($code);
        // exit;
    }

    function get_search_talent_count($search)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*,tbl_sosmed.*,tbl_prestasi.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.status', 'active');
        $this->db->like('tbl_talent.nama', $search, 'both');
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->result();
    }

    function get_by_code_talent($code_talent)
    {
        // $this->db->where($this->id, $id);
        // return $this->db->get($this->table)->row();
        $this->db->select('tbl_talent.*, tbl_photo.photo, tbl_kategori.*, tbl_prestasi.*, tbl_sosmed.*');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
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
        if (!empty($data)) {
            $index = 0;
            foreach ($data as $tag) {
                $tagsRow[$index] = $tag['tags'];
                $index++;
            }
        } else {
            $tagsRow = array();
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

    function banner($code_talent)
    {
        $this->db->select('id_banner, banner, code_talent');
        $this->db->where_in('code_talent', $code_talent);
        return $this->db->get('tbl_banner')->row();


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
        $this->db->join('tbl_tags', 'tbl_tags_label.id_tags = tbl_tags.id_tags', 'left');
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

    function get_talent($id_talent)
    {
        $this->db->select('tbl_talent.*, tbl_photo.*, tbl_kategori.*,tbl_sosmed.*,tbl_prestasi.*, tbl_banner.*');
        $this->db->join('tbl_banner', 'tbl_talent.code_talent=tbl_banner.code_talent', 'left');
        $this->db->join('tbl_photo', 'tbl_talent.code_talent=tbl_photo.code_talent', 'left');
        $this->db->join('tbl_kategori', 'tbl_talent.id_kategori=tbl_kategori.id_kategori', 'left');
        $this->db->join('tbl_sosmed', 'tbl_talent.code_talent=tbl_sosmed.code_talent', 'left');
        $this->db->join('tbl_prestasi', 'tbl_talent.code_talent=tbl_prestasi.code_talent', 'left');
        $this->db->where('tbl_talent.id_talent', $id_talent);
        $this->db->group_by('tbl_talent.code_talent');
        return $this->db->get('tbl_talent')->row();
    }

    function get_tags_talent($id)
    {
        $this->db->select('tbl_tags_label.rel_id,
        tbl_tags_label.rel_type,
        tbl_tags_label.id_tags,
        tbl_tags_label.tag_order,
        tbl_tags.tags', FALSE);
        $this->db->join('tbl_tags', 'tbl_tags_label.id_tags = tbl_tags.id_tags', 'left');
        $this->db->where('tbl_tags_label.rel_id', $id);
        $this->db->order_by('tbl_tags_label.tag_order', 'ASC');
        $data = $this->db->get('tbl_tags_label')->result_array();
        return $data;
    }

    function check_talent($id)
    {
        $this->db->select('tbl_user.*,tbl_talent.*');
        $this->db->join('tbl_talent', 'tbl_user.id_users = tbl_talent.id_users', 'left');
        $this->db->where('tbl_user.id_users', $id);
        return $this->db->get('tbl_user')->row();
    }

    function get_users($id_users)
    {
        $this->db->select('nama_lengkap');
        $this->db->where('id_users', $id_users);
        $data = $this->db->get('tbl_user')->row();
        return $data;
    }

    function get_email_users($id_users)
    {
        $this->db->select('username');
        $this->db->where('id_users', $id_users);
        $data = $this->db->get('tbl_user')->row();
        return $data;
    }

    function get_endorse_by_id($id_endorse)
    {
        $this->db->select('tbl_endorse.id_endorse,
        tbl_endorse.endorse,
        tbl_endorse.sow,
        tbl_endorse.jadwal,
        tbl_endorse.budget,
        tbl_endorse.id_users,
        tbl_talent.id_talent,
        tbl_talent.code_talent,
        tbl_talent.nama');
        $this->db->join('tbl_talent', 'tbl_endorse.code_talent=tbl_talent.code_talent', 'left');
        $this->db->where('tbl_endorse.id_endorse', $id_endorse);

        // $this->db->group_by('tbl_endorse.code_talent');
        // $this->db->order_by($code_talent,'DSC','tbl_endorse.id_endorse','DSC');
        return $this->db->get('tbl_endorse')->row();
    }

    function get_user_by_id($id_users)
    {
        $this->db->select('tbl_user.*');
        $this->db->where('tbl_user.id_users', $id_users);
        // $this->db->group_by('tbl_user.id_users');
        // $this->db->order_by($code_talent,'DSC','tbl_endorse.id_endorse','DSC');
        return $this->db->get('tbl_user')->row();
    }
}

/* End of file Tbl_talent_model.php */