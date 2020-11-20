<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	var $table = 'tb_toko';

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("admin/welcome").'")
			</script>';
		}
		$this->load->model('m_toko','Model');
	}

	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	public function index()
	{
		$title = array('title' => 'Data Toko', );
		$this->load->view('admin/temp-header',$title);
		$this->load->view('admin/v_toko');
		$this->load->view('admin/temp-footer');
	}

	public function input()
	{
		$title = array('title' => 'Data Toko', );
		$this->load->view('admin/temp-header',$title);
		$this->load->view('admin/v_input-pdft');
		$this->load->view('admin/temp-footer');
	}

	//input
	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$DataUser  = array('kd_toko' => $this->input->post('kd_toko'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				$data = array();
				$data['inputerror'][] = 'kd_toko';
				$data['error_string'][] = 'Kode toko sudah ada / tidak boleh duplikat';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}else{
				$data = array(
					'kd_toko' => $this->input->post('kd_toko'),
					'nama_toko' => $this->input->post('nama_toko'),
					'alamat_toko' => $this->input->post('alamat_toko'),
					'harga_sewa' => $this->input->post('harga_sewa'),
					'kouta_sewa' => $this->input->post('kouta_sewa')
				);
				$this->DButama->AddDB($this->table,$data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

	//hapus
	public function hapus($kd_toko)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('kd_toko' => $kd_toko);
			$this->DButama->GetDBWhere($this->table,$where)->row();
			$this->DButama->DeleteDB($this->table,$where);
			echo json_encode(array("status" => TRUE));
		}

	}

	//edit
	public function edit($kd_toko)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('kd_toko' => $kd_toko);
			$data = $this->DButama->GetDBWhere($this->table,$where)->row();
			echo json_encode($data);
		}
	}

	//proses update
	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('kd_toko' => $this->input->post('kd_toko'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$data = array(	
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat_toko' => $this->input->post('alamat_toko'),
				'harga_sewa' => $this->input->post('harga_sewa'),
				'kouta_sewa' => $this->input->post('kouta_sewa')
			);
			$this->DButama->UpdateDB($this->table,$where,$data);
			echo json_encode(array("status" => TRUE));
		}

	}

}

/* End of file Toko.php */
/* Location: ./application/controllers/admin/Toko.php */