<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->master 	= $this->load->database('master',TRUE);
		$this->area 	= $this->load->database('db_area',TRUE);
	}


	public function getDataFasilitas1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		if($search_no != "") $this->master->like('nama',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties_fasilitas t0');
        $this->master->order_by('nama', 'ASC');
		$this->master->limit($length,$start);
		$query = $this->master->get();
		// die($this->master->last_query());
		return $query->result_array();
	}

	public function getDataFasilitas2($search_no = "")
	{
		if($search_no != "") $this->master->like('nama',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties_fasilitas t0');
		$this->master->order_by('nama', 'ASC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}

	public function getData()
	{
		$this->master->select('t0.*,');
		$this->master->from('properties_fasilitas t0');
		$query = $this->master->get();
		return $query->result_array();
	}

    


    public function getDataFasilitas($id)
	{

		$this->master->select('t0.*,');
		$this->master->from('properties_fasilitas t0');
		$this->master->where('id_fasilitas',$id);
		$query = $this->master->get();
		return $query->row_array();
	}


    public function saveFasilitas()
	{
		$data = array(
			// 'saldo_cuti_normatif_id' 	=> $this->uuid->v4(),
			'nama'						=> ucwords($this->input->post('nama_fasilitas')),
		);

		$insert = $this->master->insert('properties_fasilitas', $data);

		return ($insert) ? $insert : false;
	}

	public function editFasilitas()
	{
		$id = $this->input->post('id_fasilitas');
		$data = array(
			'nama'			=> $this->input->post('nama'),
		);

		$this->master->where('id_fasilitas',$id);
		$this->master->update('properties_fasilitas', $data);

		return ($data['nama']) ? $data['nama'] : false;
	}

	public function removeFasilitas()
	{
		$id = $this->input->post('id_fasilitas');

		$this->master->where('id_fasilitas',$id);
		$this->master->delete('properties_fasilitas');

		return ($id) ? $id : false;
	}

}