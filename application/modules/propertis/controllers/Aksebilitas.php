<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksebilitas extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Aksebilitas_model');
    }


    /**  Page View  */

    public function index()
    {
        $data['title']    = 'Data Aksebilitas';

        $this->template_admin('aksebilitas/index', $data);
    }

    public function tambah()
    {
        $data['title']    = 'Tambah Aksebilitas';

        $this->template_admin('aksebilitas/tambah', $data);
    }

	public function tambah_action()
    {

		$save = $this->Aksebilitas_model->saveAksebilitas();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
		}
		redirect('propertis/aksebilitas/', 'refresh');

	}

	public function edit_action()
    {

		$save = $this->Aksebilitas_model->editAksebilitas();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
		}
		redirect('propertis/aksebilitas/', 'refresh');

	}

	public function remove_action()
    {

		$save = $this->Aksebilitas_model->removeAksebilitas();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
		}
		redirect('propertis/aksebilitas/', 'refresh');

	}


	public function get_data_edit($id)
	{
		$data = $this->Aksebilitas_model->getDataAksebilitas($id);
		// tesx($data);
		echo json_encode($data);
	}


    /**  Fetching Data */

    public function fetchDataAksebilitas()
	{
		$output = array('data' => array());

		$draw           = $_REQUEST['draw'];
		$length         = $_REQUEST['length'];
		$start          = $_REQUEST['start'];
		$search_no         = $_REQUEST['search']["value"];
		$column         = $_REQUEST['order'][0]['column'];
		$order 			= $_REQUEST['order'][0]['dir'];
		// $search_no      = $_REQUEST['columns'][0]['search']["value"];
        /* Get Datatables */
		$data           = $this->Aksebilitas_model->getDataAksebilitas1($search_no,$length,$start,$column,$order);
		$data_jum       = $this->Aksebilitas_model->getDataAksebilitas2($search_no);
        $output         = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] =$output['recordsFiltered']=$data_jum;

		if($search_no != "" ){
			$data_jum   = $this->Aksebilitas_model->getDataAksebilitas2($search_no);
			$output['recordsTotal'] = $output['recordsFiltered'] = $data_jum;
		}


		if($data){
			foreach ($data as $key => $value) {
					$buttons    = '';
					$buttons   .= '
								<button onclick="edit('."'".$value['id_aksebilitas']."'".')"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"">
								<i class="fa fa-edit fa-sm text-white-50" ></i> Edit</button>

								<button onclick="remove('."'".$value['id_aksebilitas']."'".')"
								class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"">
								<i class="fa fa-trash fa-sm text-white-50" ></i> Remove</button>';

					$output['data'][$key] = array(

						$value['nama'],
						$buttons,
					);

			}
		}else{
			$output['data'] = [];
		}

		echo json_encode($output);
	}

}