<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('url','form');	
 		$this->load->library('form_validation', 'session');
 	}
 	public function index()
 	{
 		
 		$this->load->view('login_view');	
 	}

 	public function cekLogin()
 	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDB');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('login_view');
		} else {
			redirect('pegawai/datatable','refresh');
		}
		
 	}
	
	public function cekDB($password)
 	{
 		$this->load->model('User_Model');
		$username = $this->input->post('username');
		$result = $this->User_Model->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id'=>$row->id,
					'username'=> $row->username
				);
				$this->session->set_userdata('logged_in', $sess_array);	
				
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDB',"Login Gagal Username dan Password tidak valid");
			return false;
		}
 		
 	} 

 	public function logout()
 	{
 		$this->session->unset_userdata('logged_in');
 		$this->session->sess_destroy();
 		redirect('login','refresh');
 	}
 }

 
 /* End of file Login.php */
 /* Location: ./application/controllers/Login.php */ ?>