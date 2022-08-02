<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends Takaeh_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Takaeh/Properti_model','mProperti');
		$this->load->model('Takaeh/Propertis_model','mPropertis');
    }

	/**
	 * Index Page for this controller.
	 */

	function index()
	{
		$data['title_page']		= 'Properti';
		$data['tipe'] 			= $this->mPropertis->properti_tipe();
		$this->templates_public('takaeh/properti/grid', $data);
	}


	public function fetch_data()
	{
		sleep(1);
		// $minimum_price 	= $this->input->post('minimum_price');
		// $maximum_price 	= $this->input->post('maximum_price');

		$title 		= $this->input->post('title');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');
		$status 	= $this->input->post('status');
		$pages 		= $this->input->post('pages');

		// tesx($pages);

		$total		= $this->mPropertis->count_all($title, $tipe, $lokasi, $status);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= $pages;
		$config['uri_segment'] 	= 3;
		$config['use_page_numbers'] = TRUE;

		# Tambahan untuk styling
			$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link current">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] 		= 'First';
			$config['last_link'] 		= 'Last';
			$config['next_link'] 		= 'Next';
			$config['prev_link'] 		= 'Prev';
		# Tambahan untuk styling


		$config['num_links'] 	= 3;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(3);
		$start	 	= ($page - 1) * $config['per_page'];
		$output 	= array(
			'total_data'		=> $total,
			'pagination_link'  	=> $this->pagination->create_links(),
			'properti_list'  	=> $this->mPropertis->fetch_data($config["per_page"], $start, $title, $tipe, $lokasi, $status)
		);
		echo json_encode($output);
	}


	public function list()
	{

        $this->templates_public('takaeh/properti/list');
	}


    public function detail($url)
	{
		$data['title_page']		= 'Detail Properti';
		// $url= substr($url, 0, -5);

		$data['detail'] 		= $this->mPropertis->detail_properti($url);
		tesx($data, $url);
		$this->templates_public('takaeh/properti/detail', $data);
	}



}
