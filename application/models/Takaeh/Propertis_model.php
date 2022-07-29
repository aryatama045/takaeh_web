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

        // if(isset($tipe))
        // {
        //     $tipe_filter = implode("','", $tipe);
        //     $query .= " AND properties_tipe IN('".$tipe_filter."') ";
        // }

        // if(isset($tipe))
        // {
        //     $query .= " AND properties_tipe LIKE '%".$tipe."%' ";
        // }

        // if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
        // {
        // $query .= "AND product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' ";
        // }

        // $where_search_nama = "";
		// if($search_nama !== ""){
		// 	$where_search_nama = "AND nama_lengkap LIKE '%".$search_nama."%'";
		// }


        return $query;
    }

    function count_all($title, $tipe, $lokasi)
    {
        $query = $this->make_query($title, $tipe, $lokasi);
        $data = $this->master->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start, $title, $tipe, $lokasi)
    {
        $query = $this->make_query($title, $tipe, $lokasi);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->master->query($query);

        $output = '';
        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {

                $output .= '
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="tag-for">For Sale</div>
                                    <div class="plan-price"><sup>$</sup>820<span>/month</span> </div>
                                    <img data-original="https://place-hold.it/350x250" src="https://place-hold.it/350x250" alt="property-box" class="img-fluid">
                                </a>
                                <div class="property-overlay">
                                    <a href="properties-details.html" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link property-video" title="Test Title">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="https://place-hold.it/750x540" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="https://place-hold.it/750x540"></a>
                                        <a href="https://place-hold.it/750x540"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title" >
                                    <a href="properties-details.html" title="'. $row['properties_title'] .'">'. character_limiter($row['properties_title'], '20') .'</a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>
                                        '. character_limiter($row['properties_title'], '20') .'
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> 3 Bedrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> 2 Bathrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                                    </li>
                                    <li>
                                        <i class="flaticon-car-repair"></i> 1 Garage
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#">
                                    <i class="fa fa-arrow-right"></i> Detail
                                </a>
                                <span>
                                    <i class="fa fa-calendar-o"></i> 2 day ago
                                </span>
                            </div>
                        </div>
                    </div>';
            }
            // <img src="'.base_url().'images/'. $row['properties_title'] .'" alt="" class="img-responsive" >

        } else {
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }
}