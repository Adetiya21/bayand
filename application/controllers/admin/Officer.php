<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officer extends CI_Controller {

	var $table = 'tb_officer';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("admin/welcome").'")
			</script>';
		}
		$this->load->model('m_officer','Model');
	}

	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	public function index()
	{
		$title = array('title' => 'Data Officer', );
		$this->load->view('admin/temp-header',$title);
		$this->load->view('admin/v_officer');
		$this->load->view('admin/temp-footer');
	}

	//hapus
	public function hapus($nik)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('nik' => $nik);
			$this->DButama->GetDBWhere($this->table,$where)->row();
			$this->DButama->DeleteDB($this->table,$where);
			echo json_encode(array("status" => TRUE));
		}
	}

    //input
	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$DataUser  = array('nik' => $this->input->post('nik'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				$data = array();
				$data['inputerror'][] = 'nik';
				$data['error_string'][] = 'NIK sudah ada / tidak boleh duplikat';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}else{
				$pass=$this->input->post('password');
				$hash=password_hash($pass, PASSWORD_DEFAULT);
				$data = array(
					'nik' => $this->input->post('nik'),
					'nama' => $this->input->post('nama'),
					'no_telp' => $this->input->post('no_telp'),
					'password' => $hash					
				);
				
				$this->DButama->AddDB($this->table,$data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

    //edit
	public function edit($nik)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('nik' => $nik);
			$data = $this->DButama->GetDBWhere($this->table,$where)->row();
			echo json_encode($data);
		}
	}
	
	//proses update
	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('nik' => $this->input->post('nik'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$pass=$this->input->post('password');
			$hash=password_hash($pass, PASSWORD_DEFAULT);
			$data = array(
					'nama' => $this->input->post('nama'),
					'no_telp' => $this->input->post('no_telp'),
					'password' => $hash
				);
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));
		}
	}

}

/* End of file Officer.php */
/* Location: ./application/controllers/admin/Officer.php */