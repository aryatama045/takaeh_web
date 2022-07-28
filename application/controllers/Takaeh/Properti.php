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
        $config['full_tag_open']    = '<nav aria-label="Page navigation"><ul class="pagination ts-center__horizontal">';
        $config['full_tag_close']   = '</ul></nav></div>';
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



	public function index2()
	{

        $this->templates_public('website/takaeh/properti/grid');
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
