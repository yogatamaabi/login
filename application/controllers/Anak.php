<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		}else{
			redirect('login','refresh');
		}		
	}
	
	public function index($idPegawai)
	{
		
		$this->load->model('Pegawai_Model');
		$data["anak_list"] = $this->Pegawai_Model->getAnakByPegawai($idPegawai);
		$this->load->view('anak',$data);	
	
	}

}

/* End of file Anak.php */
/* Location: ./application/controllers/Anak.php */
 ?>