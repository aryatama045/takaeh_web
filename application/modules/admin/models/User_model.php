<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getUserData1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		if($search_no != "") $this->db->like('t0.name',$search_no);

		$this->db->select('t0.*, t1.role');
		$this->db->from('user t0');
		$this->db->join('user_role t1','t0.role_id = t1.id','left');
		// if($column == 1){
			$this->db->order_by('t0.name', 'ASC');
		// }
		$this->db->limit($length,$start);
		$query=$this->db->get();
		// die(nl2br($this->db->last_query()));
		return $query->result_array();
	}

	public function getUserData2($search_no = "")
	{
		if($search_no != "") $this->db->like('t0.name',$search_no);

		$this->db->select('t0.*, t1.role');
		$this->db->from('user t0');
		$this->db->join('user_role t1','t0.role_id = t1.id','left');
		// if($column == 1){
			$this->db->order_by('t0.name', 'ASC');
		// }
		$jum=$this->db->get();

		return $jum->num_rows();
	}


}
