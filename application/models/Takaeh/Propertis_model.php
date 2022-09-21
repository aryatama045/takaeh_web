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

    function update_counter($slug)
    {
        //return current article views
        $this->master->where('properties_url', urldecode($slug));
        $this->master->select('properties_view'); 
        $count = $this->master->get('properties')->row();
        $tot    = $count->properties_view;
        if($tot==Null){
            $jum=0;
        } else {
            $jum=$tot;
        }
        // then increase by one
        $this->master->where('properties_url', urldecode($slug));
        $this->master->set('properties_view', ($jum + 1));
        $this->master->update('properties');
    }

    
    function home_properti($limit)
    {
        $this->master->select('a.*, ');
        $this->master->from('properties a');

        $this->master->limit($limit);
        $this->master->order_by('created_date', 'DESC');
        $query = $this->master->get();
        return $query->result_array();
    }


    function detail_properti($url)
    {
        $this->master->select('a.*, ');
        $this->master->from('properties a');
        $this->master->where('a.properties_url', $url);
        $query = $this->master->get();
        return $query->row_array();
    }

    function slider_properti($url)
    {
        $this->master->select('a.*,');
        $this->master->from('properties_slider a');
        $this->master->join('properties b','a.id_properties = b.id_properties','LEFT');
        $this->master->where('b.properties_url', $url);
        $this->master->order_by('a.id_properties_slider', 'ASC');
        $query = $this->master->get();
        return $query->result_array();
    }

    function properti_tipe()
    {
        $this->master->select('*,');
        $this->master->from('properties_tipe');
        $this->master->order_by('nama', 'ASC');
        $query = $this->master->get();
        return $query->result_array();
    }

    function make_query($title, $tipe, $lokasi, $status)
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

        if(isset($tipe))
        {
            $query .= " AND properties_tipe LIKE '%".$tipe."%' ";
        }

        if(isset($status))
        {
            $query .= " AND properties_tipe_jual LIKE '%".$status."%' ";
        }

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

    function count_all($title, $tipe, $lokasi, $status)
    {
        $query = $this->make_query($title, $tipe, $lokasi, $status);
        $data = $this->master->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start, $title, $tipe, $lokasi, $status)
    {
        $query = $this->make_query($title, $tipe, $lokasi, $status);

        $query .= ' ORDER BY created_date DESC ';

        $query .= ' LIMIT '.$start.', ' . $limit ;

        $data = $this->master->query($query);

        // die(nl2br($this->master->last_query()));

        // tesx($data);

        $output = "";

        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {
                $url = FCPATH.'www/properties/'.$row['properties_cover'];

                // tesx(file_exists($url));

                if(file_exists($url)){
                    $img = '<img style="width:350px; height:250px;" data-original="'.base_url('www/properties/'.$row['properties_cover']).'" src="'.base_url('www/properties/'.$row['properties_cover']).'" alt="property-box" class="img-fluid">';
                } else {
                    $img = '<img data-original="https://placehold.co/350x250" src="https://placehold.co/350x250" alt="property-box" class="img-fluid">';
                }

                if($row['properties_tipe_jual'] == 'Dijual'){
                    $status = '<div class="tag-for">For Sale</div>';
                } else {
                    $status = '<div class="tag-for">For Rent</div>';
                }

                    $harga= '<div class="plan-price"><sup>$</sup>820<span>/month</span> </div>';

                    $date= $row['created_date'];

                $output .= '
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="'.base_url('properti/detail/'.$row['properties_url']).'" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    '.$status.'

                                    '.$img.'
                                </a>
                                <div class="property-overlay">
                                    <a href="'.base_url('properti/detail/'.$row['properties_url']).'" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="https://placehold.co/750x540" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="https://placehold.co/750x540"></a>
                                        <a href="https://placehold.co/750x540"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title" >
                                    <a href="'.base_url('properti/detail/'.$row['properties_url']).'" title="'. $row['properties_title'] .'">'. character_limiter($row['properties_title'], '20') .'</a>
                                </h1>
                                <div class="location">
                                    <a href="'.base_url('properti/detail/'.$row['properties_url']).'">
                                        <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>
                                        '. character_limiter($row['properties_title'], '20') .'
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> '.$row['properties_kamar_tidur'].' Bedrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> '.$row['properties_kamar_mandi'].' Bathrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                        Sq Ft: '.$row['properties_luas_tanah'].'
                                    </li>
                                    <li>
                                        <i class="flaticon-car-repair"></i> '.$row['properties_garasi'].' Garage
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="'.base_url('properti/detail/'.$row['properties_url']).'">
                                    <i class="fa fa-arrow-right"></i> Detail
                                </a>
                                <span>
                                    <i class="fa fa-calendar-o"></i>'
                                    .date('d-m-Y' ,$date).
                                '</span>
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