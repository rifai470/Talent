<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $order = null, $required = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2' $required>";
    // $cmb .= "<option></option>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function select2_dinamis($name, $table, $field, $placeholder)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" class="form-control select2 select2-hidden-accessible" multiple="" 
               data-placeholder="' . $placeholder . '" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $select2 .= ' <option>' . $row->$field . '</option>';
    }
    $select2 .= '</select>';
    return $select2;
}

function datalist_dinamis($name, $table, $field, $value = null)
{
    $ci = get_instance();
    $string = '<input value="' . $value . '" name="' . $name . '" list="' . $name . '" class="form-control">
    <datalist id="' . $name . '">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $string .= '<option value="' . $row->$field . '">';
    }
    $string .= '</datalist>';
    return $string;
}

function rename_string_is_aktif($string)
{
    return $string == 'y' ? 'Aktif' : 'Tidak Aktif';
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('logged')) {
        redirect('auth');
    } else {
        $modul = $ci->uri->segment(1);
        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu', array('url' => $modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses', array('id_menu' => $id_menu, 'id_user_level' => $id_user_level));
        if ($id_menu == NULL) {
            redirect('auth');
            exit;
        }
    }
}

function alert($class, $title, $description)
{
    return '<div class="alert ' . $class . ' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ' . $title . '</h4>
                ' . $description . '
              </div>';
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level, $id_menu)
{
    $ci = get_instance();
    $ci->db->where('id_user_level', $id_user_level);
    $ci->db->where('id_menu', $id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
}


function autocomplate_json($table, $field)
{
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}

function cmb_dinamis2($name, $table, $field, $pk, $selected = null, $order = null, $id_name, $required = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id_name' class='form-control select2' $required style='width:100%'>";
    $cmb .= "<option></option>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function cmb_dinamis3($name, $table, $field1, $field2, $pk, $selected = null, $order = null, $required = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2' $required>";
    $cmb .= "<option></option>";
    if ($order) {
        $ci->db->order_by($field1, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field1) . " " .  strtoupper($d->$field2) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function show_my_modal($content = '', $id = '', $data = '', $size = 'md')
{
    $_ci = &get_instance();

    if ($content != '') {
        $view_content = $_ci->load->view($content, $data, TRUE);

        return '<div class="modal fade" id="' . $id . '" role="dialog">
                  <div class="modal-dialog modal-' . $size . '" role="document">
                    <div class="modal-content">
                        ' . $view_content . '
                    </div>
                  </div>
                </div>';
    }
}

function cmb_dinamis4($name, $table, $field, $pk, $selected = null, $order = null, $aktif = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control select2'>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $ci->db->where('aktif', $aktif);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}