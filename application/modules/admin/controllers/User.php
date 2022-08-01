<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'User Manage';
      
        $this->template_admin('admin/user/index', $data);
    }

    public function fetchDataUser()
	{
		$output = array('data' => array());

		$draw           = $_REQUEST['draw'];
		$length         = $_REQUEST['length'];
		$start          = $_REQUEST['start'];
		// $search         = $_REQUEST['search']["value"];
		$column         = $_REQUEST['order'][0]['column'];
		$order 			= $_REQUEST['order'][0]['dir'];
		$search_no      = $_REQUEST['columns'][0]['search']["value"];

		$data       = $this->User_model->getUserData1($search_no,$length,$start,$column,$order);
		$data_jum   = $this->User_model->getUserData2($search_no);

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$data_jum;

		if($search_no !="" ){
			$data_jum = $this->User_model->getUserData2($search_no);
			$output['recordsTotal']=$output['recordsFiltered']=$data_jum;
		}

        // tesx($data, $data_jum);

		if($data){
			foreach ($data as $key => $value) {
					$buttons    = '';
					$buttons   .= '
                        <a href="'.base_url("admin/user/edit/".$value['id']).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fa fa-plus fa-sm text-white-50"></i> Edit</a>';
                    if($value['role'] != 'Administrator'){
                        $buttons   .= '
                            <a href="'.base_url("admin/user/delete/".$value['id']).'" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                            <i class="fa fa-trash fa-sm text-white-50"></i> Delete</a>';
                    }

					$output['data'][$key] = array(
						$buttons,
						$value['name'],
						$value['email'],
						$value['role'],
					);
				// }
			}
		}else{
			$output['data'] = [];
		}
		echo json_encode($output);
	}

    public function profil()
    {
        $data['title'] = 'My Profile';
        $data['linkM']  = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->template_admin('admin/user/profil', $data);
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Profile';
        $data['linkM']  = 'User';

        $data['userd'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->template_admin('admin/user/edit', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '6048';
                $config['upload_path'] = base_url('www/user/profil/');

                

                $this->load->library('upload', $config);
                // tesx($upload_image, $config, $this->upload->do_upload());

                if ($this->upload->do_upload()) {
                   
                    $old_image = $data['userd']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(base_url('www/user/profil/'. $old_image));
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your profile cant updated!</div>');
                    redirect('admin/user/edit/'.$id);
                }
            }
            // $old_image = $data['userd']['image'];

            // tesx($config, $old_image);

            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin/user/edit/'.$id);
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['linkM']  = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->template_admin('admin/user/changepassword', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('admin/user/changepassword');
                }
            }
        }
    }
}
