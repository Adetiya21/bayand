<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	var $table = 'tb_toko';
	var $table1 = 'tb_pendaftar'; 

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('dftr_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("welcome").'")
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
		$cek = $this->DButama->GetDBWhere($this->table1,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$data['title'] = 'Data Toko';
			$data['profil'] = $cek->row();
			$this->load->view('pendaftar/temp-header',$data);
			$this->load->view('pendaftar/v_toko');
			$this->load->view('pendaftar/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}


}

/* End of file Toko.php */
/* Location: ./application/controllers/Toko.php */