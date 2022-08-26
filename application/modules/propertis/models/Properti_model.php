<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->master 	= $this->load->database('master',TRUE);
		$this->area 	= $this->load->database('db_area',TRUE);
	}

    public function getDataProperti1($search_no = "", $length = "", $start = "", $column = "", $order = "")
	{
		if($search_no != "") $this->master->like('t0.properties_title',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties t0');
		// $this->master->join('user_role t1','t0.role_id = t1.id','left');
		// if($column == 1){
			$this->master->order_by('t0.created_date', 'DESC');
		// }
		$this->master->limit($length,$start);
		$query=$this->master->get();
		// die(nl2br($this->master->last_query()));
		return $query->result_array();
	}

	public function getDataProperti2($search_no = "")
	{
		if($search_no != "") $this->master->like('t0.properties_title',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties t0');
		$this->master->order_by('t0.created_date', 'DESC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}

	public function getDataPosting($search_no = "")
	{
		if($search_no != "") $this->master->like('t0.properties_title',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties t0');
		$this->master->where('properties_active', '1');
		$this->master->order_by('t0.created_date', 'DESC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}

	public function getDataDraft($search_no = "")
	{
		if($search_no != "") $this->master->like('t0.properties_title',$search_no);

		$this->master->select('t0.*,');
		$this->master->from('properties t0');
		$this->master->where('properties_active', '0');
		$this->master->order_by('t0.created_date', 'DESC');
		$jum=$this->master->get();

		return $jum->num_rows();
	}

	public function getDataView()
	{
			$this->master->select('t0.properties_title, t0.properties_view');
			$this->master->from('properties t0');
			$this->master->limit('24');
			$this->master->order_by('t0.properties_view', 'DESC');
			$query = $this->master->get();
			return $query->result_array();
		
	}

	public function getDataProperti($id)
	{
		if($id){
			$this->master->select('t0.*,');
			$this->master->from('properties t0');
			$this->master->where('id_properties',$id);
			$query = $this->master->get();
			return $query->row_array();

		} else {
			$this->master->select('t0.*,');
			$this->master->from('properties t0');
			$query = $this->master->get();
			return $query->result_array();
		}
		
	}

	public function getDataSlider($id)
	{
		$this->master->select('t0.*,');
		$this->master->from('properties_slider t0');
		$this->master->where('id_properties',$id);
		$query = $this->master->get();
		return $query->result_array();
	}

	public function save_action()
	{
		$nama_rumah = $this->input->post('properties_title');

		$namafile 	= url_title(strtolower($this->input->post('properties_title')));

		$slug 		= url_title(strtolower($this->input->post('properties_title')));

		$featured = $this->input->post('featured');

		$rating = $this->input->post('rating');

		$ImgData = $this->input->post('imageName');

		// tesx('tes',$featured,$rating, $ImgData);

		$xfasilitas[]=$this->input->post('properties_fasilitas');
		foreach($xfasilitas as $fas){
			$fasilitas = @implode(',', $fas);
		}

		/* -- Config Image --*/
			$config['upload_path']      = FCPATH.'/www/properties';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$config['overwrite'] 		= true;
			$config['file_name'] 		= $namafile;
			$this->upload->initialize($config);
			$this->upload->do_upload('userfile');
			$data = array('upload_data' => $this->upload->data());
		/* -- Config Image --*/

		$dataProperties = array(
			// 'id_properties_kategori'    =	> json_encode($this->input->post('properties_fasilitas')),
			// 'properties_kondisi'        	=> json_encode($this->input->post('properties_aksebilitas')),
			/*'id_agent'                	=> json_encode($this->input->post('id_agent')),*/
			/* -- Detail Properti */
				'properties_title'          => $this->security->xss_clean($this->input->post('properties_title')),
				'properties_url'            => $slug.'.html',
				'properties_luas_tanah'     => $this->security->xss_clean($this->input->post('properties_luas_tanah')),
				'properties_luas_bangunan'  => $this->security->xss_clean($this->input->post('properties_luas_bangunan')),
				'properties_kamar_tidur'    => $this->security->xss_clean($this->input->post('properties_kamar_tidur')),
				'properties_kamar_mandi'    => $this->security->xss_clean($this->input->post('properties_kamar_mandi')),
				'properties_kamar_tidur_p'  => $this->security->xss_clean($this->input->post('properties_kamar_tidur_p')),
				'properties_kamar_mandi_p'  => $this->security->xss_clean($this->input->post('properties_kamar_mandi_p')),
				'properties_dapur'          => $this->security->xss_clean($this->input->post('properties_dapur')),
				'properties_garasi'         => $this->security->xss_clean($this->input->post('properties_garasi')),
				'properties_deskripsi'      => $this->security->xss_clean($this->input->post('properties_deskripsi')),
				'properties_harga'          => $this->security->xss_clean($this->input->post('properties_harga')),
				'properties_nego'           => $this->security->xss_clean($this->input->post('properties_nego')),
			/* -- Detail Properti */

			/* -- Tipe Properties -- */
				'properties_tipe_jual'      => $this->security->xss_clean($this->input->post('properties_tipe_jual')),
				'properties_tipe'           => $this->security->xss_clean($this->input->post('properties_tipe')),
				'properties_tipe_market'    => $this->security->xss_clean($this->input->post('properties_tipe_market')),
				'properties_aksebilitas'    => json_encode($this->input->post('properties_aksebilitas')),
				'properties_fasilitas'      => json_encode($this->input->post('properties_fasilitas')),
			/* -- Tipe Properties -- */

			/* -- Kondisi --*/
				'properties_sertifikat'     => $this->security->xss_clean($this->input->post('properties_sertifikat')),
				'properties_listrik'        => $this->security->xss_clean($this->input->post('properties_listrik')),
				'properties_kondisi_b'      => $this->security->xss_clean($this->input->post('properties_kondisi_bangunan')),
				'properties_jumlah_lantai'  => $this->security->xss_clean($this->input->post('properties_jumlah_lantai')),
				'properties_sumber_air'     => $this->security->xss_clean($this->input->post('properties_sumber_air')),
				'properties_bebas_banjir'   => $this->security->xss_clean($this->input->post('properties_bebas_banjir')),
				'properties_internet'       => $this->security->xss_clean($this->input->post('properties_internet')),
				'properties_ac'             => $this->security->xss_clean($this->input->post('properties_ac')),
				'properties_masuk_mobil'    => $this->security->xss_clean($this->input->post('properties_masuk_mobil')),
				'properties_line_telpon'    => $this->security->xss_clean($this->input->post('properties_line_telpon')),
				'properties_genset'         => $this->security->xss_clean($this->input->post('properties_genset')),
				
				'properties_alamat'         => $this->security->xss_clean($this->input->post('properties_alamat')),
				'properties_video'          => $this->input->post('properties_video'),
				'properties_cover'          => $this->upload->data('file_name'),
				'properties_active'         => $this->input->post('properties_active'),
				'created_date'              => time(),
			/* -- Kondisi --*/
        );
		// $this->master->insert('properties', $dataProperties);

		/* -- Properties Lokasi --*/
			$id_properties_lokasi= $this->master->insert_id();
			$dataPropertiesLokasi = array(
				'id_properties'             => $id_properties_lokasi,
				'provinsi_id'    => $this->security->xss_clean($this->input->post('properties_provinsi')),
				'kota_id'        => $this->security->xss_clean($this->input->post('properties_kota')),
				'kabupaten_id'   => $this->security->xss_clean($this->input->post('properties_kabupaten')),
				'kecamatan_id'   => $this->security->xss_clean($this->input->post('properties_kecamatan'))
			);
			// $this->master->insert('properties_lokasi', $dataPropertiesLokasi);
		/* -- Properties Lokasi --*/

		/* --Add Item Slider --*/
			$data           = array('upload_data' => $this->upload->data());
			$id_properties  = $this->master->insert_id();
			$slug           = url_title(strtolower($this->input->post('properties_title')));
			$photo_cover    = $slug.'.html';
			// $filesCount 	= count($_FILES['userfile2']['name']);

			$countfiles = implode(' @$ ', $this->input->post('image'));
			$imgaeview 	= explode(' @$ ', $countfiles);

			// $imgaeview	= $this->input->post('image');
			// $countfiles = count($this->input->post('image'));

			// tesx($countfiles ,$imgaeview);

			// foreach ($imgaeview as $key => $val)
			$ximg = $this->input->post('image');
			foreach($ximg as $key =>$val){


				// if($this->is_base64($base64string) == true ){
				// 	$base64string = "data:image/jpeg;base64,".$base64string;
				// 	$this->check_size($base64string);
				// 	$this->check_dir($path);
				// 	$this->check_file_type($base64string);

				// 	/*=================uploads=================*/
				// 	list($type, $base64string) = explode(';', $base64string);
				// 	list(,$extension)          = explode('/',$type);
				// 	list(,$base64string)       = explode(',', $base64string);
				// 	$fileName                  = uniqid().date('Y_m_d').'.'.$extension;
				// 	$base64string              = base64_decode($base64string);
				// 	file_put_contents($path.$fileName, $base64string);
				// }
				$base64string = "data:image/jpg;base64,".$val;
				list($type, $base64string) = explode(';', $base64string);
				list(,$extension)          = explode('/',$type);
				list(,$base64string)       = explode(',', $base64string);
				$filename     = $slug.'-'.time().'-thumb.'.$extension;
				$base64       = base64_decode($base64string);

				// $img = str_replace('data:image/png;base64,', '', $val);
				// $img = str_replace(' ', '+', $img);
				// $base64 = base64_decode($img);
				// $filename     = $slug.'-'.time().'-thumb.png';

				$file 			= FCPATH.'/www/properties/sliders/'.$filename;
				file_put_contents($file, $base64);


				// array_push($result, $filename);

				$imageData = array(
					'id_properties' => $id_properties,
					'photo_slider' 	=> $filename,
					'properties_url' => $photo_cover,
				);
				// $this->db->insert('properties_slider',$imageData);
			}

			tesx($ximg);
			// $result = array();
				// for ($i = 0; $i < $filesCount; ) {

				// 	$ImgThumb = $ImgData[$i];
				// 	$img = str_replace('data:image/png;base64,', '', $ImgThumb);
				// 	$encoded = str_replace(' ', '+', $img);
				// 	$decoded = base64_decode($encoded);

				// 	$path = FCPATH.'/www/properties/sliders/'.$slug[$i].'-'.+'1'.'-thumb.png';

				// 	file_put_contents($path,$decoded);

				// 	array_push($result, $ImgThumb);
				// 	$type 		= strtolower($_FILES['userfile2']['name'][$i]);

				// 	$name_sub 	= str_replace(' ', '-', strtolower($type));

				// 	$_FILES['file']['name'] 	= $slug.'-'.+'1'.'-'.time().'-'.$name_sub;
				// 	$_FILES['file']['type'] 	= $_FILES['userfile2']['type'][$i];
				// 	$_FILES['file']['tmp_name']	= $_FILES['userfile2']['tmp_name'][$i];
				// 	$_FILES['file']['error'] 	= $_FILES['userfile2']['error'][$i];
				// 	$_FILES['file']['size']		= $_FILES['userfile2']['size'][$i];

				// 	// File upload configuration
				// 	$uploadPath = FCPATH.'/www/properties/sliders/';
				// 	$configs['upload_path'] = $uploadPath;
				// 	$configs['allowed_types'] = 'jpg|jpeg|png|gif';


				// 	// Load and initialize upload library
				// 	$this->load->library('upload', $configs);
				// 	$this->upload->initialize($configs);

				// 	// Upload file to server
				// 	if ($this->upload->do_upload('file')) {
				// 		// Uploaded file data
				// 		$fileData = $this->upload->data();
				// 		$ImgData[$i]['id_properties'] 	= $id_properties;
				// 		$ImgData[$i]['photo_slider'] 	= $slug.'-'.+'1'.'-'.time().'-'.$name_sub ;
				// 		$ImgData[$i]['properties_url'] 	= $photo_cover;
				// 	}
				// }
			// $this->master->insert_batch('properties_slider', $ImgData);
		/* --Add Item Slider --*/

		// tesx($nama_rumah, $dataProperties, $ImgData);

		return ($nama_rumah)?$nama_rumah:false;
	}

	function is_base64($s){
        // Check if there are valid base64 characters
       // if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;
        // Decode the string in strict mode and check the results
        $decoded = base64_decode($s, true);
        if(false === $decoded) return false;
        // Encode the string again
        if(base64_encode($decoded) != $s) return false;
        return true;
    }

	public function check_size($base64string){
        $file_size = 8000000;
        $size = @getimagesize($base64string);
        if($size['bits'] >= $file_size){
            print_r(json_encode(array('status' =>false,'message' => 'file size not allowed !')));exit;
        }
        return true;
    }

    public function check_dir($path){
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return true;
        }
        return true;
    }

    public function check_file_type($base64string){
        $mime_type = @mime_content_type($base64string);
        $allowed_file_types = ['image/png', 'image/jpeg', 'application/pdf'];
        if (! in_array($mime_type, $allowed_file_types)) {
            // File type is NOT allowed
           // print_r(json_encode(array('status' =>false,'message' => 'File type is NOT allowed !')));exit;
        }
        return true;
    }

	public function removeProperti()
	{
		$id = $this->input->post('id_properties');

		$thumb = $this->getDataProperti($id);
		if(!empty($thumb)){
			unlink(FCPATH.'/www/properties/'.$thumb['properties_cover']);
		}

        $slider = $this->getDataSlider($id);
		foreach($slider as $s){
			if(!empty($s)){
				unlink(FCPATH.'/www/properties/sliders/'.$s['photo_slider']);
			}
		}

		$this->master->delete('properties_lokasi',
							array('id_properties' => $id));
		$this->master->delete('properties_slider',
							array('id_properties' => $id));
		$this->master->delete('properties',
								array('id_properties' => $id));

		// tesx('tes');
		return ($id) ? $id : false;
	}

	public function getprovinsi(){
		$this->area->order_by('name','ASC');
		$provinsi = $this->area->get('provinsi');
		return $provinsi->result_array();
	}

	public function getkota($provinsiId){

		$kota="<option>-- Pilih Kota --</pilih>";
		$this->area->order_by('name','ASC');
		$subs= $this->area->get_where('kota',array('provinsi_id'=>$provinsiId));

		foreach ($subs->result_array() as $data ){
			$kota.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kota;
	}

	public function getkabupaten($kotaId){

		$kabupaten="<option>-- Pilih Kabupaten --</pilih>";
		$this->area->order_by('name','ASC');
		$subs= $this->area->get_where('kabupaten',array('kota_id'=>$kotaId));

		foreach ($subs->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kabupaten;
	}

	public function getkecamatan($kabupatenId){

		$kecamatan="<option>-- Pilih Kecamatan --</pilih>";
		$this->area->order_by('name','ASC');
		$subs= $this->area->get_where('kecamatan',array('kabupaten_id'=>$kabupatenId));

		foreach ($subs->result_array() as $data ){
			$kecamatan.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kecamatan;
	}


}