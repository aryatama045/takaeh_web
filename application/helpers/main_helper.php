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

    if(!function_exists('get_url')) {
        function get_url($params = "pagenotfound")
        {
            return site_url(ADMIN_ROUTE."/$params");
        }
    }

    if(!function_exists('url')) {
        function url($params = "pagenotfound")
        {
            return site_url(ADMIN_ROUTE."/$params");
        }
    }

    if (!function_exists('cclang'))
    {
        function cclang($langkey = null, $params = [])
        {
            if (!is_array($params)) {
                $params = [$params];
            }

            $lang = lang($langkey);

            $idx = 1;
            foreach ($params as $value) {
                $lang = str_replace('$'.$idx++, $value, $lang);
            }

            $lang = preg_replace('/\$([0-9])/', '', $lang);

            if (!$lang) {
                return ucwords($langkey);
            }

            return $lang;
        }
    }

    function setting($kd = null , $field = "value")
    {
        $ci =  &get_instance();
        $kd = strtolower($kd);
        $qry = $ci->db->get_where("setting", ["options" => $kd]);
        if ($qry->num_rows() > 0) {
            return $qry->row()->$field;
        }else {
            return "System not available";
        }
    }

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
        // tesx($_SESSION['user']['email']);
        if (!$_SESSION['user']['email']) {
            redirect('login');
        } else {
            $role_id = $ci->session->userdata('role_id');
            $url = uri_string(1);
            $menu2 = ($ci->uri->segment(2));
            // $menu2 = '/'.$menu[2];

            // $ci->db->like('url' , $url);
            // $queryMenu = $ci->db->get_where('menus')->row_array();

            // tesx($url, $menu2);
            // $menu_id = $queryMenu['id'];

            // $userAccess = $ci->db->get_where('user_access_menu', [
            //     'role_id' => $role_id,
            //     'menu_id' => $menu_id
            // ]);

            // if ($userAccess->num_rows() < 1) {
            //     redirect('auth/blocked');
            // }
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

    function time_ago($time, $now)
    {
        $periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        if($now == NULL){
            $now = time();
        }

        $difference     = $now - $time;
        $tense         = "ago";

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        // if($difference != 1) {
        //     $periods[$j].= "s";
        // }

        return "$difference $periods[$j] ";
    }

    function selisih_jam($time, $now){

        $diff  = $now-$time;
        $jam   = floor($diff / (60 * 60));
        $menit = $diff - ( $jam * (60 * 60) );
        $detik = $diff % 60;

        $result = $jam . ' Jam : ' . floor( $menit / 60 ) . ' Menit : ' .$detik. ' Detik';
        // tesx($result);
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
