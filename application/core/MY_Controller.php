<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );


	class MY_Controller extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

		}
	}

	class Admin_Controller extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			is_logged_in();
			$this->load->model('Website_model');

		}

		public function template_admin($page = null, $data = array())
		{
			$group_id			= 1;
			$data['user']     	= $this->Website_model->getSessionUser();
			$data['menuAdmin'] 	= $this->Website_model->menuAdmin($group_id);

			// $data['submenuAdmin'] 	= $this->Website_model->submenuAdmin();

			// tesx($data['submenuAdmin']);

			$this->load->view('themes/admin/header',$data);
			$this->load->view('themes/admin/topbar',$data);
			$this->load->view('themes/admin/sidebar',$data);
			$this->load->view($page, $data);
			$this->load->view('themes/admin/footer',$data);
		}

		public function template_email($page = null, $data = array())
		{
			$this->load->view($page, $data);
		}

	}

	class Takaeh_Controller extends MY_Controller
	{

		public function __construct()
		{
			parent::__construct();
			// is_logged_in();

		}

		public function templates_public($page = null, $data = array())
		{
			$data['user']     = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('themes/takaeh/header',$data);
			$this->load->view('themes/takaeh/topbar',$data);
			$this->load->view('themes/takaeh/menu_header',$data);
			$this->load->view($page, $data);
			$this->load->view('themes/takaeh/footer',$data);
		}
	}


	class Kayo_Controller extends MY_Controller
	{
		public function template_public($page = null, $data = array())
		{
			$data['user']     = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('public/header',$data);
			$this->load->view('public/sidebar',$data);
			$this->load->view('public/topbar',$data);
			$this->load->view($page, $data);
			$this->load->view('public/footer',$data);
		}
	}
