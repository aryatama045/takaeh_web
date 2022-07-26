<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->master 	= $this->load->database('master',TRUE);
		$this->area 	= $this->load->database('db_area',TRUE);
	}


	public function getData()
	{

		$this->master->select('t0.*,');
		$this->master->from('properties_kategori t0');
		$query = $this->master->get();
		return $query->result_array();
	}

    public function getDataKategori1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		if($search_no != "") $this->master->like('t0.properties_kategori',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties_kategori t0');
        $this->master->order_by('t0.properties_kategori', 'ASC');
		$this->master->limit($length,$start);
		$query=$this->master->get();
		return $query->result_array();
	}

	public function getDataKategori2($search_no = "")
	{
		if($search_no != "") $this->master->like('t0.properties_kategori',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties_kategori t0');
		$this->master->order_by('t0.properties_kategori', 'ASC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}


    public function getDataKategori($id)
	{

		$this->master->select('t0.*,');
		$this->master->from('properties_kategori t0');
		$this->master->where('id_properties_kategori',$id);
		$query = $this->master->get();
		return $query->row_array();
	}


    public function saveKategori()
	{
		$data = array(
			// 'saldo_cuti_normatif_id' 	=> $this->uuid->v4(),
			'properties_kategori'	=> ucwords($this->input->post('properties_kategori')),
		);

		$insert = $this->master->insert('properties_kategori', $data);

		return ($insert) ? $insert : false;
	}

	public function editKategori()
	{
		$id = $this->input->post('id_properties_kategori');
		$data = array(
			'properties_kategori'	=> ucwords($this->input->post('properties_kategori')),
		);

		$this->master->where('id_properties_kategori',$id);
		$this->master->update('properties_kategori', $data);

		return ($data['properties_kategori']) ? $data['properties_kategori'] : false;
	}

	public function removeKategori()
	{
		$id = $this->input->post('id_properties_kategori');



		$this->master->where('id_properties_kategori',$id);
		$this->master->delete('properties_kategori');

		return ($id) ? $id : false;
	}

}