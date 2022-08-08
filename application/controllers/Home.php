<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Takaeh_Controller {

	/**
	 * Index Page for this controller.
	*/

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Takaeh/Propertis_model', 'mPropertis');

    }

	public function index()
	{

		$data['title_page']		= 'Properti';
		$limit					= '10';
		$data['feature'] 		= $this->mPropertis->home_properti($limit);
        $this->templates_public('takaeh/home/index', $data);
	}


}
