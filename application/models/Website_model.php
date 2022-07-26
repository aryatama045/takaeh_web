<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->web 	    = $this->load->database('master',TRUE);
		$this->area 	= $this->load->database('db_area',TRUE);
	}

	public function getSessionUser(){

		if($this->session->userdata('email') != NULL){
			$email = $this->input->post('email');
		}else{
			$email = $this->session->userdata('email');
		}
		
		$query = $this->db->get_where('user',
		['email' =>$this->session->userdata('email')])
		->row_array();
		return $query;
	}

    public function getDataWebsite()
	{
		$this->db->select('t0.*,');
		$this->db->from('web_profil t0');
		$this->db->where('id_properties', 1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function menuAdmin($group_id){
		$role_id = $this->session->userdata('role_id');

		$queryMenu = "SELECT a.icon, a.id, a.parent_id, a.position, a.title , a.url
		FROM menus a
		JOIN user_access_menu ON a.id = user_access_menu.menu_id
		WHERE user_access_menu.role_id = $role_id
		AND a.group_id = $group_id
		AND a.parent_id = 0
		ORDER BY a.id ASC";
		$menu = $this->db->query($queryMenu)->result_array();
		return $menu;
	}

	public function submenuAdmin(){
		$role_id = $this->session->userdata('role_id');
		$dm =$this->menuAdmin();
		// tesx($dm);
		foreach($dm as $m){
			$menuId = $m['id'];
			$querySubMenu = "SELECT a.id, a.parent_id, a.position,title,url,a.icon
                        FROM menus a
                        JOIN user_access_menu b ON a.id = b.menu_id
                        WHERE b.role_id = $role_id
                        AND a.parent_id = $menuId
                        ORDER BY a.position ASC";
                    // tesx($querySubMenu);
            $subMenu = $this->db->query($querySubMenu)->result_array();
		}
		return $subMenu;

	}



}