<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends Takaeh_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Takaeh/Properti_model','mProperti');
		$this->load->model('Takaeh/Propertis_model','mPropertis');
    }

	/**
	 * Index Page for this controller.
	 */

	function index()
	{
		$data['title_page']		= 'Properti';
		$data['tipe'] 			= $this->mPropertis->properti_tipe();
		$this->templates_public('takaeh/properti/grid', $data);
	}

	public function detail($url)
	{
		$cek 		= $this->mPropertis->detail_properti($url);

		if($cek != Null){
			$data['title_page']		= 'Detail Properti';
			// $url= substr($url, 0, -5);
			$data['detail'] 		= $this->mPropertis->detail_properti($url);
			$data['slider'] 		= $this->mPropertis->slider_properti($url);
			$data['tipe'] 			= $this->mPropertis->properti_tipe();
			$data['count_slider']	= count($data['slider']);
			$this->templates_public('takaeh/properti/detail', $data);

			$this->add_count($url);
        }else{
            //jika data tidak ditemukan, maka kembali ke blog
            redirect('properti');
        }
	}


	public function fetch_data()
	{
		sleep(1);
		// $minimum_price 	= $this->input->post('minimum_price');
		// $maximum_price 	= $this->input->post('maximum_price');

		$title 		= $this->input->post('title');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');
		$status 	= $this->input->post('status');
		$pages 		= $this->input->post('pages');

		$total		= $this->mPropertis->count_all($title, $tipe, $lokasi, $status);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= $pages;
		$config['uri_segment'] 	= 3;
		$config['use_page_numbers'] = TRUE;

		# Tambahan untuk styling
			$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link current">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] 		= 'First';
			$config['last_link'] 		= 'Last';
			$config['next_link'] 		= 'Next';
			$config['prev_link'] 		= 'Prev';
		# Tambahan untuk styling


		$config['num_links'] 	= 5;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(3);
		$start	 	= ($page - 1) * $config['per_page'];

		// tesx($page);

		$output 	= array(
			'total_data'		=> $total.' Data Found',
			'pagination_link'  	=> $this->pagination->create_links(),
			'properti_list'  	=> $this->mPropertis->fetch_data($config["per_page"], $start, $title, $tipe, $lokasi, $status)
		);

		echo json_encode($output);
	}

	public function search()
	{
		sleep(1);

		$title 		= $this->input->post('title');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');
		$status 	= $this->input->post('status');
		$pages 		= 10;

		// tesx($title, $tipe, $status);

		$total		= $this->mPropertis->count_all($title, $tipe, $lokasi, $status);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= $pages;
		$config['uri_segment'] 	= 2;
		$config['use_page_numbers'] = TRUE;

		# Tambahan untuk styling
			$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link current">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] 		= 'First';
			$config['last_link'] 		= 'Last';
			$config['next_link'] 		= 'Next';
			$config['prev_link'] 		= 'Prev';
		# Tambahan untuk styling


		$config['num_links'] 	= 3;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(2);

		$start	 	= ($page - 1) * $config['per_page'];
		$output 	= array(
			'total_data'		=> $total.' Data Found',
			'pagination_link'  	=> $this->pagination->create_links(),
			'properti_list'  	=> $this->mPropertis->fetch_data($config["per_page"], $start, $title, $tipe, $lokasi, $status)
		);

		// tesx($output);
		$this->templates_public('takaeh/properti/list', $output);

	}

	public function kategori($url)
	{
		sleep(1);
		// $minimum_price 	= $this->input->post('minimum_price');
		// $maximum_price 	= $this->input->post('maximum_price');

		tesx($url);
		$title 		= $this->input->post('title');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');
		$status 	= $this->input->post('status');
		$pages 		= $this->input->post('pages');

		$total		= $this->mPropertis->count_all($title, $tipe, $lokasi, $status);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= $pages;
		$config['uri_segment'] 	= 3;
		$config['use_page_numbers'] = TRUE;

		# Tambahan untuk styling
			$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link current">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] 		= 'First';
			$config['last_link'] 		= 'Last';
			$config['next_link'] 		= 'Next';
			$config['prev_link'] 		= 'Prev';
		# Tambahan untuk styling


		$config['num_links'] 	= 3;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(3);
		$start	 	= ($page - 1) * $config['per_page'];

		// tesx($page);

		$output 	= array(
			'total_data'		=> $total.' Data Found',
			'pagination_link'  	=> $this->pagination->create_links(),
			'properti_list'  	=> $this->mPropertis->fetch_data($config["per_page"], $start, $title, $tipe, $lokasi, $status)
		);

		echo json_encode($output);
	}


	function kategori2(){
		$kategori=str_replace("-"," ",$this->uri->segment(3));
		$query = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_kategori_nama LIKE '%$kategori%' ORDER BY tulisan_views DESC LIMIT 5");
		if($query->num_rows() > 0){
			$x['data']=$query;
			$x['category']=$this->db->get('tbl_kategori');
			 $x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$this->load->view('depan/v_blog',$x);
		}else{
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');
			redirect('artikel');
		}
	}

	function search2($page = NULL){


		// $title 		= str_replace("'", "", htmlspecialchars($this->input->post('title',TRUE),ENT_QUOTES));
		$title 		= $this->input->post('title');
		$lokasi 	= '';
		$tipe 		= '';
		$status 	= '';
		$pages 		= 10;


		$total		= $this->mPropertis->count_all($title, $tipe, $lokasi, $status);

		// tesx($title, $tipe, $status, $total);

		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url() . 'properti/search2/';
		$config['total_rows'] 	= $total;
		$config['per_page'] 	= $pages;
		$config['uri_segment'] 	= 3;
		$config['use_page_numbers'] = TRUE;

		# Tambahan untuk styling
			$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><a class="page-link active">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] 		= 'First';
			$config['last_link'] 		= 'Last';
			$config['next_link'] 		= 'Next';
			$config['prev_link'] 		= 'Prev';
		# Tambahan untuk styling


		$config['num_links'] 	= 3;
		$this->pagination->initialize($config);
		$page 		= $this->uri->segment(3);
		// $start	 	= ($page) * $config['per_page'];
		if($page==Null){$page =0;}else{$page = $page;}
		$start	 	= ($page) * $config['per_page'];

		// tesx($page, $start);

		// if($total > 0){

			$x['title_page']		= 'Properti - Search';
			$x['properti_list']		= $this->mPropertis->fetch_search($config["per_page"], $start, $title, $tipe, $lokasi, $status);
			$x['pagination_link'] 	= $this->pagination->create_links();
			$x['tipe'] 				= $this->mPropertis->properti_tipe();

			// tesx($x['properti_list']);

			$this->templates_public('takaeh/properti/search', $x);
		// }else{
		// 	tesx('error-page');
		// 		echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');
		// 		redirect('artikel');
		// }
	}



	// This is the counter function..
	function add_count($slug)
	{

		// load cookie helper
		$this->load->helper('cookie');
		// this line will return the cookie which has slug name
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);

		// this line will return the visitor ip address
		$ip = $this->input->ip_address();

		// tesx($slug,$ip, $check_visitor);
		// if the visitor visit this article for first time then //
		// //set new cookie and update article_views column ..
		// //you might be notice we used slug for cookie name and ip
		// //address for value to distinguish between articles views
		if ($check_visitor == false) {
			$cookie = array("name" => urldecode($slug), "value" => "$ip", "expire" => time() + 7200, "secure" => false);
			$this->input->set_cookie($cookie);
			$this->mPropertis->update_counter(urldecode($slug));
		}
	}

}
