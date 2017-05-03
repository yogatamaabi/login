<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Registrasi extends CI_Controller {
 
	 public function __construct()
	 {
	 	parent::__construct();
 		$this->load->helper('url','form');	
 		$this->load->library('form_validation', 'session');
	 }
 	public function index()
 	{
 		$this->load->view('registrasi_view');
 	}

 	public function create()
 	{
 		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique|callback_isUsernameExist');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|min_length[6]|matches[password]');

		$this->load->model('User_Model');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('registrasi_view');
		} else {
		
			redirect('login','refresh');
		}
	}

	public function isUsernameExist($username) {
	    $this->load->library('form_validation');
	    $this->load->model('User_Model');
	    $is_exist = $this->User_Model->isUsernameExist($username);

	    if ($is_exist) {
	        $this->form_validation->set_message('isUsernameExist', 'Username sudah ada.');    
	        return false;
	    } else {
	    	$this->User_Model->insertUser();
	    	redirect('login','refresh');
	        return true;
	    }
	}

 }
 
 /* End of file Registrasi.php */
 /* Location: ./application/controllers/Registrasi.php */ ?>