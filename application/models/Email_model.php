
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->web 	    = $this->load->database('master',TRUE);
		$this->area 	= $this->load->database('db_area',TRUE);
		$this->load->config('email');
        $this->load->library('email');
	}

    public function send_verify($token, $email, $type)
	{

		$data = array(
			'judul' 		=> 'Verify',
			'nama_user'		=> '',
			'nip'			=> '',
			'divisi'		=> '',
		);

        $subject = 'Pengajuan  - '.$data['nama_user'];
		$from 	= $this->config->item('smtp_user');
        $to 	= $email;

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);

        $this->email->subject($subject);
		$this->email->message($this->load->view('themes/admin/email/verify',$data,true));
		$this->email->send();
		// 	if($this->email->send()){
		// 	echo "Mail Sent ok";
		// 	}else{
		// 	echo "Error";
		// 	}
        // echo json_encode($response);
    }

}