<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $table = 'tb_admin';

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("admin/welcome").'")
			</script>';
			// redirect('admin/welcome');
		}
	}
	
	// public function json() {
	// 	if ($this->input->is_ajax_request()) {
	// 		header('Content-Type: application/json');
	// 		echo $this->Model->json();
	// 	}
	// }

	public function index()
	{
		$title = array('title' => 'Dashboard', );
		$data['swmenunggu'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Menunggu'))->num_rows();
		$data['swditerima'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Diterima'))->num_rows();
		$data['swditolak'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Ditolak'))->num_rows();
		$data['swselesai'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Selesai'))->num_rows();
		$data['swall'] = $this->DButama->GetDB('tb_sewa')->num_rows();
		$data['pdftmenunggu'] = $this->DButama->GetDBWhere('tb_pendaftar', array('status' => 'Menunggu'))->num_rows();
		$data['pdftditerima'] = $this->DButama->GetDBWhere('tb_pendaftar', array('status' => 'Diterima'))->num_rows();
		$data['pdftall'] = $this->DButama->GetDB('tb_pendaftar')->num_rows();
		$data['officer'] = $this->DButama->GetDB('tb_officer')->num_rows();
		$data['admin'] = $this->DButama->GetDB('tb_admin')->num_rows();
		$data['toko'] = $this->DButama->GetDB('tb_toko')->num_rows();
		$this->load->view('admin/temp-header',$title);
		$this->load->view('admin/v_index',$data);
		$this->load->view('admin/temp-footer');
	}

	public function profil($id)
	{
		$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek->num_rows() == 1) {
			$title = array('title' => 'Profil', );
			$data['profil'] = $cek->row();
			$this->load->view('admin/temp-header',$title);
			$this->load->view('admin/v_profil',$data);
			$this->load->view('admin/temp-footer');
		}else{
			// redirect('error404','refresh');
		}
	}

	function edit_profil()
	{
		$this->load->library('form_validation');

		$config = array(
			array('field' => 'nama','label' => 'Nama','rules' => 'required',),
			array('field' => 'username','label' => 'Username','rules' => 'required'),
			array('field' => 'password','label' => 'Password','rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/home/profil/'.$this->session->userdata('id').'','refresh');
		}else{
			$where  = array('id' => $this->input->post('id'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
				$pass=$this->input->post('password');
				$hash=password_hash($pass, PASSWORD_DEFAULT);
				$data = array(

					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $hash
				);

				$this->DButama->UpdateDB($this->table,$where,$data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Akun anda sudah diperbaharui</strong> 
							</div>');
				redirect('admin/home/profil/'.$this->session->userdata('id').'','refresh');
		
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */