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
        $data['time_zone'] = $this->time_zone();
        $this->template_admin('admin/setting/webinfo', $data);

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



    function update_action()
    {
        if ($this->input->is_ajax_request()) {
            $enc_url = $this->config->item("encryption_url") ? "TRUE":"FALSE";
            $hooks = $this->config->item("enable_hooks") ? "TRUE":"FALSE";
            $config = array('php_tag_open' 	=> '<?php',
                            'time_zone' => $this->config->item("time_zone"),
                            'language' => $this->config->item("language"),
                            'encryption_key' => $this->config->item("encryption_key"),
                            'encryption_url' => $enc_url,
                            'enable_hooks' => $hooks,
                            'url_suffix' => $this->config->item("url_suffix"),
                            'max_upload' => $this->config->item("max_upload")
                            );

            $constants = array('php_tag_open' 	=> '<?php',
                                'route_default' => 'home',
                                'route_admin' => ADMIN_ROUTE,
                                'route_login' => LOGIN_ROUTE,
                                );

            $pk = $this->input->post("pk", true);
            $name = $this->input->post("name", true);
            $value = htmlspecialchars($this->input->post("value", true));

            // $json = array('success'=>false, 'msg'=>array());
            // if (!is_allowed("config_update_".strtolower($name))) {
            // return $this->response([
            //     'success' => false,
            //     'msg' => "Do not have permission to update"
            // ]);
            // }

            if ($name == "email") {
            $this->form_validation->set_rules("value","* ","trim|xss_clean|required|valid_email");
            }elseif($name == "max_upload"){
            $this->form_validation->set_rules("value","* ","trim|xss_clean|required|numeric");
            }elseif ($name == "route_admin") {
            $this->form_validation->set_rules("value","* ","trim|xss_clean|alpha_numeric|required|callback__cek_route_admin");
            }elseif($name == "route_login"){
            $this->form_validation->set_rules("value","* ","trim|xss_clean|alpha_numeric|required|callback__cek_route_login");
            }elseif ($name == "logo" or $name == "logo_mini" or $name == "favicon") {
            $this->form_validation->set_rules("value","* ","trim|xss_clean|required");
            }elseif ($name == "url_suffix") {
            $this->form_validation->set_rules("value","* ","trim|xss_clean|max_length[5]|callback__cek_url_suffix");
            }else {
            $this->form_validation->set_rules("value","* ","trim|xss_clean|htmlspecialchars|required");
            }
            $this->form_validation->set_error_delimiters('','');

            if ($this->form_validation->run()) {

                if ($pk == "999") {
                    $this->load->library("parser");
                    $this->load->helper("file");
                    $config[$name] = $value;
                    $config_template = $this->parser->parse('admin/setting/config_template.txt', $config, TRUE);
                        write_file(FCPATH . '/application/config/'.ENVIRONMENT.'/config.php', $config_template);
                }elseif ($pk == "998") {
                    $this->load->library("parser");
                    $this->load->helper("file");
                    $constants[$name] = strtolower($value);
                    $constants_template = $this->parser->parse('admin/setting/constants_template.txt', $constants, TRUE);
                        write_file(FCPATH . '/application/config/constants.php', $constants_template);
                }else {

                    $this->db->where("options",$name);
                    $this->db->from("setting");
                    $cek = $this->db->get()->row_array();

                    // tesx($pk, $name, $cek);

                    if($cek == Null){
                        $data = array(
                            "id_setting" => $pk,
                            "options"   => $name,
                            "value"     => $value,
                        );
                        $this->db->insert("setting", $data);

                    }else{
                        $data = array(
                            "value" => $value
                        );
                        $this->db->set($data);
                        $this->db->where("id_setting", $pk);
                        $this->db->update("setting");
                    }
                    // tesx($data);
                }

                $json['value'] = strtolower($value);
                $json['success'] = true;
            }else {
                $json['msg'] = form_error("value");
            }

            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your profile cant updated!</div>');
            // redirect('admin/setting');
        }
    }


    function time_zone()
    {
        $timezones = [];
        foreach(timezone_abbreviations_list() as $abbr => $timezone){
            foreach($timezone as $val){
                if(isset($val['timezone_id'])){
                            $timezones[$val['timezone_id']] = $val['timezone_id'];
                }
            }
        }

        foreach ($timezones as $tmzid) {
            $json[] = array("value" => $tmzid,
                "text" => $tmzid
            );
        }

        sort($json);
        return json_encode($json);
    }

    function _cek_route_admin($str)
    {
        if ($str == LOGIN_ROUTE) {
            $this->form_validation->set_message('_cek_route_admin', $str.' characters may not be used.');
            return FALSE;
        }else {
            return true;
        }
    }

    function _cek_route_login($str)
    {
        if ($str == "backend" OR $str == ADMIN_ROUTE) {
            $this->form_validation->set_message('_cek_route_login', $str.' characters may not be used.');
            return FALSE;
        }else {
            return true;
        }

    }

    function _cek_url_suffix($str)
    {
        $params = substr($str, 0,1);
        if ($str != "") {
        if ($params != ".") {
            $this->form_validation->set_message('_cek_url_suffix', ' character must start with (dot).');
            return FALSE;
        }
        }
        return TRUE;
    }
}
