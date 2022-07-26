<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksebilitas_model extends CI_Model
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
		$this->master->from('.properties_aksebilitas t0');
		$query = $this->master->get();
		return $query->result_array();
	}

    public function getDataAksebilitas1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		if($search_no != "") $this->master->like('t0.nama',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('.properties_aksebilitas t0');
        $this->master->order_by('t0.nama', 'ASC');
		$this->master->limit($length,$start);
		$query=$this->master->get();
		return $query->result_array();
	}

	public function getDataAksebilitas2($search_no = "")
	{
		if($search_no != "") $this->master->like('t0.nama',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('.properties_aksebilitas t0');
		$this->master->order_by('t0.nama', 'ASC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}


    public function getDataAksebilitas($id)
	{

		$this->master->select('t0.*,');
		$this->master->from('.properties_aksebilitas t0');
		$this->master->where('id_aksebilitas',$id);
		$query = $this->master->get();
		return $query->row_array();
	}


    public function saveAksebilitas()
	{
		$data = array(
			// 'saldo_cuti_normatif_id' 	=> $this->uuid->v4(),
			'nama'						=> ucwords($this->input->post('nama_aksebilitas')),
		);

		$insert = $this->master->insert('.properties_aksebilitas', $data);

		return ($insert) ? $insert : false;
	}

	public function editAksebilitas()
	{
		$id = $this->input->post('id_aksebilitas');
		$data = array(
			'nama'			=> $this->input->post('nama'),
		);

		$this->master->where('id_aksebilitas',$id);
		$this->master->update('.properties_aksebilitas', $data);

		return ($data['nama']) ? $data['nama'] : false;
	}

	public function removeAksebilitas()
	{
		$id = $this->input->post('id_aksebilitas');



		$this->master->where('id_aksebilitas',$id);
		$this->master->delete('.properties_aksebilitas');

		return ($id) ? $id : false;
	}

}