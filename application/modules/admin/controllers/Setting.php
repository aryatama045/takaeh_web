<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Menu_model');

    }


    public function index()
    {
        $data['title']  = 'Setting';
        $this->template_admin('admin/index', $data);

    }


    public function role()
    {
        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->template_admin('admin/role', $data);
    }

    public function roleAdd()
    {

    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $group_id      = '1';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get_where('menus', ['group_id' => $group_id ])->result_array();


        $items	            = $this->Menu_model->get_items($group_id );
        $data['menuss']	    = $this->Menu_model->generateTree($items);

        $this->template_admin('admin/role_access', $data);
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
