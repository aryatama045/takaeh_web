<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Takaeh_Controller {

	/**
	 * Index Page for this controller.
	*/

	function __construct()
    {
        parent::__construct();
        is_logged_agent();
        $this->load->model('Takaeh/Propertis_model', 'mPropertis');

    }

	function index()
	{

		$data['title_page']		= 'Account';
        $this->templates_public('takaeh/agent/index', $data);
	}

    function profile()
	{
		$data['title_page']		= 'Account';
        $this->templates_public('takaeh/agent/profile', $data);
	}

    function properties()
	{
		$data['title_page']		= 'Account';
        $this->templates_public('takaeh/agent/index', $data);
	}

    function submit()
	{
		$data['title_page']		= 'Account';
        $this->templates_public('takaeh/agent/submit', $data);
	}


}