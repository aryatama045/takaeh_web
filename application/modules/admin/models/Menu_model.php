<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenu()
    {
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT user_menu.id, menu
                        FROM user_menu JOIN user_access_menu
                        ON user_menu.id = user_access_menu.menu_id
                    WHERE user_access_menu.role_id = $role_id
                    ORDER BY user_access_menu.menu_id ASC
                    ";
        $queryMenu = $this->db->query($queryMenu);
        // die(json_encode($queryMenu));
        return $queryMenu->result_array();
    }

    public function getSubMenu()
    {
        $this->db->select('a.*, b.menu');
        $this->db->from('user_sub_menu a');
        $this->db->join('user_menu b', 'a.menu_id = b.id', 'left');
        $query= $this->db->get();
        // die(nl2br($this->db->last_query()));
		return $query->result_array();
    }


    function get_items($group_id) {
        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('group_id', $group_id);
        $this->db->order_by('parent_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }


    function generateTree($items = array(), $parent_id = 0){

        $role = $this->session->userdata('role_id');
        $tree = '<ul>';
        $course =array();
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['parent_id'] == $parent_id){
                $tree .= '<li>';
                $tree .= '<div class="form-check" style="margin-left:-20px;">
                            <input class="form-check-input" type="checkbox" '.check_access($role, $items[$i]['id']).'
                            data-role="'.$role.'" data-menu="'.$items[$i]['id'].'">
                        </div>';


                $tree .= '<a href="'.base_url($items[$i]['url']).'">'.$items[$i]['title'].'</a>';
                $tree .= $this->generateTree($items, $items[$i]['id']);
                    // $courses = 'BTech,MTech,PHD-Sci,PHD-Engg';
                    // $course = explode(",", $items[$i]['url']);
                    // $tree .= '<ul>';
                    // foreach ($course as $rows){
                    //     if($rows != null || $rows != ''){
                    //     $tree .= '<li>';
                    //     $tree .= $rows;
                    //     $tree .= '</li>';}
                    // }
                    // $tree .= '</ul>';

                $tree .= '</li>';
            }
        }
        $tree .= '</ul>';
        // tesx($course);
        return $tree;
    }


/** ___________________________________ New Model ___________________________________ */

    public function get_menu($group_id)
    {
        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('group_id',$group_id);
        $this->db->order_by('parent_id , position');
        $query = $this->db->get();
        $res = $query->result();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }

    /**
     * Get group title
     *
     * @param int $group_id
     * @return string
     */
    public function get_menu_group_title($group_id) {
        $this->db->select('*');
        $this->db->from('menu_group');
        $this->db->where('id', $group_id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get all items in menu group table
     *
     * @return array
     */
    public function get_menu_groups() {
        $this->db->select('*');
        $this->db->from('menu_group');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_menu_group($data) {
        if ($this->db->insert('menu_group', $data)) {
            $response['status'] = 1;
            $response['id'] = $this->db->Insert_ID();
            return $response;
        } else {
            $response['status'] = 2;
            $response['msg'] = 'Add group error.';
            return $response;
        }
    }

    public function get_row($id) {
        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get the highest position number
     *
     * @param int $group_id
     * @return string
     */
    public function get_last_position($group_id) {
        $pos;
        $this->db->select_max('position');
        $this->db->from('menus');
        $this->db->where('group_id', $group_id);
        $this->db->where('parent_id', '0');
        $query = $this->db->get();
        $data = $query->row();
        $pos = $data->position + 1;
        return $pos;
    }

    /**
     * Recursive method
     * Get all descendant ids from current id
     * save to $this->ids
     *
     * @param int $id
     */
    public function get_descendants($id) {
        $this->db->select('id');
        $this->db->from('menus');
        $this->db->where('parent_id', $id);
        $query = $this->db->get();
        $data = $query->row();

        $ids;
        if (!empty($data)) {
            foreach ($data as $v) {
                $ids[] = $v;
                $this->get_descendants($v);
            }
        }
    }

    //Delete the menu
    public function delete_menu($id) {
        $this->db->where('id', $id);
        return $this->db->delete('menus');
    }

    //Update MenuController Group
    public function update_menu_group($data, $id) {
        if ($this->db->update('menu_group', $data, 'id' . ' = ' . $id)) {
            return true;
        }
    }

    //Delete MenuController Group
    public function delete_menu_group($id) {
        $this->db->where('id', $id);
        return $this->db->delete('menu_group');
    }

    public function delete_menus($id) {
        $this->db->where('group_id', $id);
        return $this->db->delete('menus');
    }


    # Get Datatables
    public function getMenuData1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		// if($search_no != "") $this->db->like('t0.nama_karyawan',$search_no);

		$this->db->select('*');
		$this->db->from('menu_group t0');
		// $this->db->join('user_role t1','t0.role_id = t1.id','left');
		// if($column == 1){
			// $this->db->order_by('t0.nama_karyawan', 'ASC');
		// }
		$this->db->limit($length,$start);
		$query=$this->db->get();
		// die(nl2br($this->db->last_query()));
		return $query->result_array();
	}

	public function getMenuData2($search_no = "")
	{
		// if($search_no != "") $this->db->like('t0.nama_karyawan',$search_no);

		$this->db->select('*');
		$this->db->from('menu_group t0');
		// $this->db->join('user_role t1','t0.role_id = t1.id','left');
		// $this->db->order_by('t0.nama_karyawan', 'DESC');
		$jum=$this->db->get();

		return $jum->num_rows();
	}

}
