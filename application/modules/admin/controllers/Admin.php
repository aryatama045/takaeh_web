<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller

{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('propertis/properti_model');

    }


    public function index()
    {

        $data['jml_properti'] = $this->properti_model->getDataProperti2();

        $this->template_admin('admin/dashboard/index', $data);
    }


    public function dashboard()
    {
        $data['title']    = 'Dashboard';

        $data['jml_properti'] = $this->properti_model->getDataProperti2();

        $this->template_admin('admin/dashboard/index', $data);
    }



}