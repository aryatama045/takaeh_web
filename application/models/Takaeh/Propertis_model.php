<?php
	/*
    Copyright Arya45
    Class Name : Properti Model */

	defined('BASEPATH') OR exit('No direct script access allowed');

class Propertis_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->master 	= $this->load->database('master',TRUE);
        $this->area 	= $this->load->database('db_area',TRUE);
    }

    function fetch_filter_type($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('product');
        $this->db->where('product_status', '1');
        return $this->db->get();
    }

    function make_query($title, $tipe, $lokasi)
    {
        $query = "SELECT * FROM properties WHERE properties_active = '1'";

        if(isset($title))
        {
            $query .= " AND properties_title LIKE '%".$title."%' ";
        }

        if(isset($tipe))
        {
            $query .= " AND properties_tipe LIKE '%".$tipe."%' ";
        }

        // if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
        // {
        // $query .= "AND product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' ";
        // }

        // $where_search_nama = "";
		// if($search_nama !== ""){
		// 	$where_search_nama = "AND nama_lengkap LIKE '%".$search_nama."%'";
		// }

        // if(isset($ram))
        // {
        //     $ram_filter = implode("','", $ram);
        //     $query .= " AND product_ram IN('".$ram_filter."') ";
        // }


        return $query;
    }

    function count_all($title, $tipe, $lokasi)
    {
        $query = $this->make_query($title, $tipe, $lokasi);
        $data = $this->hrd->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start, $title, $tipe, $lokasi)
    {
        $query = $this->make_query($title, $tipe, $lokasi);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                <img src="'.base_url().'images/'. $row['product_image'] .'" alt="" class="img-responsive" >
                <p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
                <h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
                <p>Camera : '. $row['product_camera'].' MP<br />
                Brand : '. $row['product_brand'] .' <br />
                RAM : '. $row['product_ram'] .' GB<br />
                Storage : '. $row['product_storage'] .' GB </p>
                </div>
                </div>
                ';
            }
        } else {
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }
}