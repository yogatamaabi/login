<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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
		$data["jabatan_list"] = $this->Pegawai_Model->getJabatanByPegawai($idPegawai);
		$this->load->view('jabatan', $data);
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>