<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Properti_model');
		$this->load->model('Aksebilitas_model');
		$this->load->model('Fasilitas_model');
		$this->load->model('Kategori_model');
		$this->load->model('Tipe_model');
    }


    /**  Page View  */

    public function index()
    {
        $data['title']    = 'Properti';
		$data['jml_properti'] = $this->Properti_model->getDataProperti2();
        $this->template_admin('properti/index', $data);
    }

    public function tambah()
    {
		$this->form_validation->set_rules('properties_title','Nama Properti','required',
			array(	'required' 	=> 'Nama Properti Tidak Boleh Kosong !!',
		));

		if ($this->form_validation->run() == TRUE) {

			$save_action = $this->Properti_model->save_action();

			if($save_action == true) {
				$this->session->set_flashdata('success', 'Properti "'.$save_action.'" Berhasil Disimpan');
				redirect('propertis/properti', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error !!');
				redirect('propertis/properti/tambah', 'refresh');
			}

		} else {
			$data['title']    	= 'Properti';
			$data['provinsi'] 		= $this->Properti_model->getprovinsi();
			$data['aksebilitas'] 	= $this->Aksebilitas_model->getData();
			$data['fasilitas'] 		= $this->Fasilitas_model->getData();
			$data['tipe'] 			= $this->Tipe_model->getData();


			$this->template_admin('properti/tambah_new', $data);
		}

    }

	public function edit($id)
    {
		$this->form_validation->set_rules('properties_title','Nama Properti','required',
			array(	'required' 	=> 'Nama Properti Tidak Boleh Kosong !!',
		));

		if ($this->form_validation->run() == TRUE) {

			// tesx('tes');

			$save_action = $this->Properti_model->save_action();

			if($save_action == true) {
				$this->session->set_flashdata('success', 'Properti "'.$save_action.'" Berhasil Disimpan');
				redirect('propertis/properti', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error !!');
				redirect('propertis/properti/edit', 'refresh');
			}

		} else {
			$data['title']    	= 'Properti';
			$data['linkM']    	= 'master Properti';
			$data['data'] 		= $this->Properti_model->getDataProperti($id);
			$this->template_admin('properti/edit', $data);
		}

    }

	public function remove_action()
    {

		$save = $this->Properti_model->removeProperti();

		if($save) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('propertis/properti', 'refresh');
		}
		else {
			$this->session->set_flashdata('error', 'Error occurred!!');
			redirect('propertis/properti', 'refresh');
		}

		// $this->session->set_flashdata('msg', 'process-success');
        // redirect(''. $_SERVER['HTTP_REFERER']);

	}

	public function get_data($id)
	{
		$data = $this->Properti_model->getDataProperti($id);
		// tesx($data);
		echo json_encode($data);
	}

    /**  Fetching Data */

    public function fetchDataProperti()
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
		$data           = $this->Properti_model->getDataProperti1($search_no,$length,$start,$column,$order);
		$data_jum       = $this->Properti_model->getDataProperti2($search_no);
        $output         = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] =$output['recordsFiltered']=$data_jum;

		if($search_no != "" ){
			$data_jum   = $this->Properti_model->getDataProperti2($search_no);
			$output['recordsTotal'] = $output['recordsFiltered'] = $data_jum;
		}

		if($data){
			foreach ($data as $key => $value) {
					$buttons    = '';
					$buttons   .= '
								<a href="'.base_url("properti/detail/".$value['properties_url']).'"
								class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" target="_blank">
								<i class="fa fa-eye fa-sm text-white-20"></i> View</a>

                                <a href="'.base_url("propertis/properti/edit/".$value['id_properties']).'"
								class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-edit fa-sm text-white-20"></i> Edit</a>

                                <button onclick="remove('."'".$value['id_properties']."'".')"
								class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
								<i class="fa fa-trash fa-sm text-white-20" ></i> Remove</button>';

                    // $title = substr($value['properties_title'],0,50);
					$title 	= "<a href='#' title='".$value['properties_title']."' > <b>".word_limiter($value['properties_title'],5)."</b></a>";
					$date	= date('d F Y', $value['created_date']);
					$publish	= ($value['properties_active']=='1')? 
									"<span class='badge badge-success'>Publish</span>":
									"<span class='badge badge-warning text-white'>Draft</span>";
					$img	= 	'<a class="d-flex" href="Pages.Product.Detail.html">
									<img src="https://placehold.co/100x100/666/fff.png?text=Not%20Found"
									class="border-0" />
								</a>';

					$output['data'][$key] = array(
						$img,
                        $title,
						$value['properties_tipe'],
						$publish,
						$date,
						$buttons,
					);
				// }
			}
		}else{
			$output['data'] = [];
		}

		echo json_encode($output);
	}


	public function kode_area(){

        $modul=$this->input->post('modul');
        $id=$this->input->post('id');

        if($modul=="kota"){
            echo $this->Properti_model->getkota($id);
        } else if ($modul=="kabupaten"){
            echo $this->Properti_model->getkabupaten($id);

        } else if ($modul=="kecamatan"){
            echo $this->Properti_model->getkecamatan($id);
        }

    }

}