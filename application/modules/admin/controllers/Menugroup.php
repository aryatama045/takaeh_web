<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menugroup extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('Menu_model', 'manager');
        $this->load->helper('menu_helper');
    }

    public function index() {

    }

    /**
     * Add group action
     * or
     * Show add group form
     */
    public function add() {
        // tesx('tes');
        if (isset($_POST['title'])) {
            $data['title'] = $this->input->post('title');
            if (!empty($data['title'])) {
                if ($this->db->insert('menu_group', $data)) {
                    $response['status'] = 1;
                    $response['id'] = $this->db->Insert_ID();
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Add group error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        } else {
            $this->load->view('menu/modal_add_group');
        }
    }

    public function edit() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if ($title) {
            $data['title'] = $title;
            $response['success'] = false;
            $res = $this->manager->update_menu_group($data, $id);
            if ($res) {
                $response['success'] = true;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    public function delete() {
        $id = $this->input->post('id');
        if ($id) {
            if ($id == 1) {
                $response['success'] = false;
                $response['msg'] = 'Cannot delete Group ID = 1';
            } else {
                $delete = $this->manager->delete_menu_group($id);
                if ($delete) {
                    $del = $this->manager->delete_menus($id);
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                }
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }


    public function fetchData()
	{
		$output = array('data' => array());

		$draw           = $_REQUEST['draw'];
		$length         = $_REQUEST['length'];
		$start          = $_REQUEST['start'];
		// $search         = $_REQUEST['search']["value"];
		$column         = $_REQUEST['order'][0]['column'];
		$order 			= $_REQUEST['order'][0]['dir'];
		$search_no      = $_REQUEST['columns'][0]['search']["value"];

		$data       = $this->manager->getMenuData1($search_no,$length,$start,$column,$order);
		$data_jum   = $this->manager->getMenuData2($search_no);

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$data_jum;

		if($search_no !="" ){
			$data_jum = $this->manager->getMenuData2($search_no);
			$output['recordsTotal']=$output['recordsFiltered']=$data_jum;
		}

        // tesx($data, $data_jum);

		if($data){
            $no=1;
			foreach ($data as $key => $value) {
					$buttons    = '';
					$buttons   .= ' <a href="'.base_url('admin/menu/menu/').$value['id'].'"
                                class="btn btn-primary mb-1"><i class="simple-icon-note" ></i> Edit</a>';

					$output['data'][$key] = array(
                        $no,
						$value['title'],
						$buttons
					);
                    $no++;
			}
		}else{
			$output['data'] = [];
		}
		echo json_encode($output);
	}

}
