<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends Takaeh_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('takaeh/properti_model','mProperties');

    }

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->data = array(
					'title'		=> 'Takaeh',
					'page'		=> '-Properties');
		// $agent = $this->session->userdata('name');
		$jum	= $this->mProperties->get_properties();
		$page	= $this->uri->segment(3);
		if(!$page):
			$off = 0;
		else:
			$off = $page;
		endif;
		$limit=18;
		$offset = $off > 0 ? (($off - 1) * $limit) : $off;
		$config['base_url'] = base_url() . 'properti/page/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['use_page_numbers']=TRUE;

	    //Tambahan untuk styling
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

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';

		$this->pagination->initialize($config);

		$x = array(
			'title'				=> 'Takaeh',
			'properties'        => $this->mProperties->get_properties_perpage($offset,$limit),
			'paginations'		=> $this->pagination->create_links(),
			'page'				=> ' - Properties List'
		);

		// tesx($x);

		// $this->template_takaeh('takaeh/properties/index', $x);
		$this->templates_public('website/takaeh/properti/grid', $x);

	}


	function index2()
	{
		// $data['brand_data'] 		= $this->mProperties->fetch_filter_type('product_brand');
		// $data['ram_data'] 			= $this->mProperties->fetch_filter_type('product_ram');
		// $data['product_storage'] 	= $this->mProperties->fetch_filter_type('product_storage');
		$this->templates_public('website/takaeh/properti/grid');
	}

	public function fetch_data()
	{
		sleep(1);
		// $minimum_price 	= $this->input->post('minimum_price');
		// $maximum_price 	= $this->input->post('maximum_price');
		$title 		= $this->input->post('title');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');

		$total		= $this->mProperties->count_all($title, $tipe, $lokasi);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= 8;
		$config['uri_segment'] 	= 3;
		$config['use_page_numbers'] = TRUE;

		//Tambahan untuk styling
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

		// $config['full_tag_open'] = '<ul class="pagination">';
			// 	$config['full_tag_close'] = '</ul>';
			// 	$config['first_tag_open'] = '<li>';
			// 	$config['first_tag_close'] = '</li>';
			// 	$config['last_tag_open'] = '<li>';
			// 	$config['last_tag_close'] = '</li>';
			// 	$config['next_link'] = '&gt;';
			// 	$config['next_tag_open'] = '<li>';
			// 	$config['next_tag_close'] = '</li>';
			// 	$config['prev_link'] = '&lt;';
			// 	$config['prev_tag_open'] = '<li>';
			// 	$config['prev_tag_close'] = '</li>';
			// 	$config['cur_tag_open'] = "<li class='active'><a href='#'>";
			// 	$config['cur_tag_close'] = '</a></li>';
			// 	$config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';

		$config['num_links'] 	= 3;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(3);
		$start	 	= ($page - 1) * $config['per_page'];
		$output 	= array(
			'pagination_link'  	=> $this->pagination->create_links(),
			'properti_list'  	=> $this->mProperties->fetch_data($config["per_page"], $start, $title, $tipe, $lokasi)
		);
		echo json_encode($output);
	}





	public function list()
	{

        $this->templates_public('website/takaeh/properti/list');
	}


    public function detail()
	{

        $this->templates_public('website/takaeh/properti/detail');
	}



}
