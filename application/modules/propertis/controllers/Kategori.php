<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }


    /**  Page View  */

    public function index()
    {
        $data['title']    = 'Data Kategori';
        $data['linkM']    = 'master Properti';

        $this->template_admin('kategori/index', $data);
    }

    public function tambah()
    {
        $data['title']    = 'Data Kategori';
        $data['linkM']    = 'master Properti';
        

        $this->template_admin('kategori/tambah', $data);
    }

	public function tambah_action()
    {
		
		$save = $this->Kategori_model->saveKategori();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('propertis/kategori', 'refresh');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect('propertis/kategori/tambah', 'refresh');
		}

	}

	public function edit_action()
    {
		
		$save = $this->Kategori_model->editKategori();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('propertis/kategori', 'refresh');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect('propertis/kategori/index', 'refresh');
		}

	}

	public function remove_action()
    {
		
		$save = $this->Kategori_model->removeKategori();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('propertis/kategori', 'refresh');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect('propertis/kategori/index', 'refresh');
		}

	}


	public function get_data_edit($id)
	{
		$data = $this->Kategori_model->getDataKategori($id);
		// tesx($data);
		echo json_encode($data);
	}


    /**  Fetching Data */

    public function fetchDataKategori()
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
		$data           = $this->Kategori_model->getDataKategori1($search_no,$length,$start,$column,$order);
		$data_jum       = $this->Kategori_model->getDataKategori2($search_no);
        $output         = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] =$output['recordsFiltered']=$data_jum;

		if($search_no != "" ){
			$data_jum   = $this->Kategori_model->getDataKategori2($search_no);
			$output['recordsTotal'] = $output['recordsFiltered'] = $data_jum;
		}
        

		if($data){
			foreach ($data as $key => $value) {
					$buttons    = '';
					$buttons   .= '
								<button onclick="edit('."'".$value['id_properties_kategori']."'".')"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"">
								<i class="fa fa-edit fa-sm text-white-50" ></i> Edit</button>

								<button onclick="remove('."'".$value['id_properties_kategori']."'".')"
								class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
								<i class="fa fa-trash fa-sm text-white-50" ></i> Remove</button>';
                    
					$output['data'][$key] = array(
						
						$value['properties_kategori'],
						$buttons,
					);
				// }
			}
		}else{
			$output['data'] = [];
		}

        
		echo json_encode($output);
	}

}