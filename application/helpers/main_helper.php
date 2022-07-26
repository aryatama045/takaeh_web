<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * WEBSITE INFORMATION
 *
 * @param int $id ID of the item
 * @param int $parent parent ID of the item
 * @param string $li_attr attributes for <li>
 * @param string $label text inside <li></li>
 */



function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('admin-login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $url = uri_string(1);
        $menu2 = ($ci->uri->segment(2));
        // $menu2 = '/'.$menu[2];

        $ci->db->like('url' , $url);
        $queryMenu = $ci->db->get_where('menus')->row_array();

        // tesx($url, $menu2);
        // $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            // 'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function is_logged_agent()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('agent-login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $url = uri_string(1);
        $menu2 = ($ci->uri->segment(2));
        // $menu2 = '/'.$menu[2];

        $ci->db->like('url' , $url);
        $queryMenu = $ci->db->get_where('menus')->row_array();

        // tesx($url, $menu2);
        // $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            // 'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function nominal($angka){
    $jd = number_format($angka,2,',','.');
    return $jd;
}

function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari];

    return $result;
}

function tesx()
{
    $env = (ENVIRONMENT == 'production') ? 'none' : 'block';
    $args = func_get_args();
    if(is_array($args) && count($args)){ foreach($args as $x){
        $echo = "<div style='display:$env'><pre>";
        if(is_array($x) || is_object($x)){
            $echo .= print_r($x, true);
        }else{
            $echo .= var_export($x, true);
        }
        $echo .= "</pre><hr /></div>";
        echo $echo;
    }}
    die();
}
