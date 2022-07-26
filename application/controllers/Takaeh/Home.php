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
        $this->load->model('propertis/properti_model');

    }

	public function index()
	{

        $this->templates_public('website/takaeh/home/index');
	}


}
