<?php
	/*
    Copyright Arya45
    Class Name : Properti Model */

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Properti_model extends CI_Model {

        function __construct(){
            parent::__construct();
            $this->master 	= $this->load->database('master',TRUE);
            $this->area 	= $this->load->database('db_area',TRUE);
        }

        public function fetch_data()
        {

        }

        public function count_all()
        {
            
        }

		// Get Properti
        public function get_properties(){
            $query = $this->master->get('properties');
            return $query;
        }

        public function get_properties_by($agent){
            $query = $this->master->query("SELECT properties.*,email FROM properties
                JOIN user ON id_agent=id
                WHERE id_agent LIKE '%$agent%'");
            return $query;
        }


        public function get_properties_perpage($offset,$limit){
            /*if ($this->session->userdata('email')) {*/
            /*	$query = $this->master->query("SELECT properties.*,name FROM properties
                LEFT JOIN user ON id_agent=id
                WHERE id_agent LIKE '%$agent%' LIMIT $offset,$limit");
                return $query;

            } else {*/
                $this->master->from('properties');
                $this->master->order_by('id_properties', 'DESC');
                $this->master->limit($limit,$offset);
                $query = $this->master->get();
                return $query;

            /*}*/
        }

        public function getPropertiesHome(){
                $this->master->limit(20);
                $this->master->order_by('created_date','desc');
                $query = $this->master->get('properties');
                return $query->result();
        }

        public function getProperties($id = FALSE){
            if ($id === FALSE) {
                $this->master->join('properties_kategori','properties_kategori.id_properties_kategori=properties.id_properties_kategori','LEFT');
                $this->master->join('user','user.id=properties.id_agent','LEFT');
                $this->master->order_by('id_properties','desc');
                $query = $this->master->get('properties');
                return $query->result();
            }else{
                $this->master->join('properties_kategori','properties_kategori.id_properties_kategori=properties.id_properties_kategori','LEFT');
                $this->master->join('user','user.id=properties.id_agent','LEFT');
                $query = $this->master->get_where('properties', array('properties_url'=>$id));
                return $query->row();
            }
        }

        public function getSliderProperties($id){
                $query = $this->master->get_where('properties_slider', array('properties_url'=>$id));
                return $query->result();
        }


        public function getFasilitas($idFasilitas = null)
        {
            if($idFasilitas) {
                $sql = "SELECT * FROM properties_fasilitas WHERE id_properties_fasilitas = ?";
                $query = $this->master->query($sql, array($idFasilitas));
                return $query->row_array();
            }

            $sql = "SELECT * FROM properties_fasilitas WHERE active = ? ORDER BY id_properties_fasilitas DESC";
            $query = $this->master->query($sql, array(1));
            return $query->result_array();
        }

        public function getFasilitasActive()
        {
            $sql = "SELECT * FROM properties_fasilitas WHERE active = ?";
            $query = $this->master->query($sql, array(1));
            return $query->result_array();
        }

        public function getKondisiActive()
        {
            $sql = "SELECT * FROM properties_kondisi WHERE active = ?";
            $query = $this->master->query($sql, array(1));
            return $query->result_array();
        }

        public function getKondisiData($id = null)
        {
            if($id) {
                $sql = "SELECT * FROM properties_kondisi WHERE id_properties_kondisi = ?";
                $query = $this->master->query($sql, array($id));
                return $query->row_array();
            }

            $sql = "SELECT * FROM properties_kondisi ORDER BY id_properties_kondisi DESC";
            $query = $this->master->query($sql);
            return $query->result_array();
        }

        public function getAksebilitasData($id = null)
        {
            if($id) {
                $sql = "SELECT * FROM properties_aksebilitas WHERE id_aksebilitas = ?";
                $query = $this->master->query($sql, array($id));
                return $query->row_array();
            }

            $sql = "SELECT * FROM properties_aksebilitas ORDER BY id_aksebilitas DESC";
            $query = $this->master->query($sql);
            return $query->result_array();
        }

        public function getFasilitasData($id = null)
        {
            if($id) {
                $sql = "SELECT * FROM properties_fasilitas WHERE id = ?";
                $query = $this->master->query($sql, array($id));
                return $query->row_array();
            }

            $sql = "SELECT * FROM properties_fasilitas ORDER BY id DESC";
            $query = $this->master->query($sql);
            return $query->result_array();
        }

        public function setProperties($dataProperties)
        {
            return $this->master->insert('properties', $dataProperties);
        }

        public function setPropertiesLokasi($dataPropertiesLokasi)
        {
            return $this->master->insert('properties_lokasi', $dataPropertiesLokasi);
        }

        public function setSlider($data = array()){
            $insert =  $this->master->insert_batch('properties_slider',$data);
            return $insert?true:false;
        }

	}