<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
	public function index()
	{
		$this->load->model('Pegawai_Model');
		$data["pegawai_list"] = $this->Pegawai_Model->getDataPegawai();
		$this->load->view('pegawai',$data);	
	}

	public function datatable()
	{
		$this->load->model('Pegawai_Model');
		$data["pegawai_list"] = $this->Pegawai_Model->getDataPegawai();
		$this->load->view('pegawai_datatable',$data);	
	}


	public function datatable_ajax()
	{
		$this->load->view('pegawai_datatable_ajax');	
	}
	
	public function data_server()
	{
        $this->load->library('Datatables');
        $this->datatables
                ->select('id,nama,nip,tanggalLahir,alamat,foto')
                ->from('pegawai');
        echo $this->datatables->generate();
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|numeric|min_length[2]|max_length[12]');
		$this->form_validation->set_rules('tanggalLahir', 'TanggalLahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|alpha_numeric|min_length[5]|max_length[50]');
		$this->load->model('Pegawai_Model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pegawai_view');

		}else{
			$config['upload_path']			='./assets/uploads';
			$config['allowed_types']		='gif|jpg|png';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo "<script> alert('Gambar belum diisi'); 
				window.location.href='http://localhost:8080/codeigniter_alpha2/index.php/pegawai/create';</script>";	
			}
			else
			{
				$this->Pegawai_Model->insertPegawai();
               	redirect('pegawai/datatable');
			}

		}
	}
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		$this->load->helper('url','form', 'file');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('Pegawai_Model');
		$data['pegawai']=$this->Pegawai_Model->getPegawai($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('edit_pegawai_view',$data);
		}
		else
		{
			    $config['upload_path']          = './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);


               	if ( ! $this->upload->do_upload('userfile')){
				
					$this->Pegawai_Model->updatePegawaiTanpaFoto($id);
					$data["pegawai_list"] = $this->Pegawai_Model->getDataPegawai();	
					$this->load->view('pegawai_datatable', $data);
				
				}
				else{
					$this->Pegawai_Model->updatePegawai($id);
					$data["pegawai_list"] = $this->Pegawai_Model->getDataPegawai();	
					$this->load->view('pegawai_datatable', $data);
				}

      //           if ( ! $this->upload->do_upload('userfile'))
      //           {
      //                   $error = array('error' => $this->upload->display_errors());
						// echo "<script> alert('Gambar belum diisi'); 
						// window.location.href='http://localhost:8181/codeigniter_alpha/index.php/pegawai/create';</script>";
      //           }
      //           else
      //           {
      //           		//echo "<pre>";	
      //           		//var_dump($this->upload->data());
      //           		//die();

						// $this->Pegawai_Model->updateById($id);
						// unlink('assets/uploads/'.$namaFile);
						// redirect('pegawai/datatable');
      //           }
		}
	}

	
		

	public function delete($id)
	{
		//$where=array('id'=>$id);
		//$this->load->model('pegawai_model');

		//$this->load->model('pegawai_model');
		//$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//$namaFile = $data['pegawai']->foto;
		//unlink('assets/uploads/'.$namaFile);

		//$this->pegawai_model->deleteById($id);
		//redirect('pegawai/datatable','refresh');
		$this->load->model('Pegawai_Model');
		$path= './assets/uploads/';
		$where = array('id' => $id);
		$rowdel = $this->Pegawai_Model->get_byimage($where,'pegawai');
		@unlink($path.$rowdel->foto);

		$this->Pegawai_Model->m_delete($where,'pegawai');
		redirect('pegawai/datatable', 'refresh');
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>