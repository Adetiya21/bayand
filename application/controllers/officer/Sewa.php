<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	var $table = 'tb_sewa';

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('officer_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("officer/welcome").'")
			</script>';
		}
		$this->load->model('m_sewa','Model');
	}

	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json_officer();
		}
	}

	public function jsonTerima() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json_admin1();
		}
	}

	public function index()
	{
		$data['title'] = 'Data Pengajuan Sewa';
		$this->load->view('officer/temp-header',$data);
		$this->load->view('officer/v_sewa');
		$this->load->view('officer/temp-footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Pengajuan Sewa';
		$this->load->view('officer/temp-header',$data);
		$this->load->view('officer/v_laporan-sewa');
		$this->load->view('officer/temp-footer');
	}

	//hapus
	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);
			$this->DButama->GetDBWhere($this->table,$where)->row();
			$this->DButama->DeleteDB($this->table,$where);
			echo json_encode(array("status" => TRUE));
		}
	}

	//input
	public function input()
	{
		$data['title'] = 'Input Pengajuan Sewa';
		$data['pdft'] = $this->db->order_by('nama', 'asc');
		$data['pdft'] = $this->DButama->GetDB('tb_pendaftar');
		$data['toko'] = $this->db->order_by('nama_toko', 'asc');
		$data['toko'] = $this->DButama->GetDB('tb_toko');
		$this->load->view('officer/temp-header',$data);
		$this->load->view('officer/v_input-sewa',$data);
		$this->load->view('officer/temp-footer');
	}

	//proses
	public function proses()
	{
		$tgl_sewa = $this->input->post('tgl_sewa');
        $tgl_sewa = date('Y-m-d', strtotime($tgl_sewa));
        $tgl_selesai = $this->input->post('tgl_selesai');
        // $tgl_selesai = date('Y-d-m', strtotime($tgl_selesai));
		
		$data = array(
			'id_pendaftar' => $this->input->post('id_pendaftar'),
			'kd_toko' => $this->input->post('kd_toko'),
			'tgl_sewa' => $tgl_sewa,
			'jangka_sewa' => $this->input->post('jangka_sewa'),
			'tgl_selesai' => $tgl_selesai,
			'kebutuhan' => $this->input->post('kebutuhan'),
			'produk_jual' => $this->input->post('produk_jual'),
			'total' => $this->input->post('total'),
			'luas_sewa' => '2x1',
			'status' => $this->input->post('status')
		);
		$this->DButama->AddDB($this->table,$data);
		redirect('officer/sewa','refresh');
	}

	//edit
	public function edit($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);
			$data = $this->DButama->GetDBWhere($this->table,$where)->row();
			echo json_encode($data);
		}
	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$data = array(
					'id_officer' => $this->input->post('id_officer'),
					'status' => $this->input->post('status')
				);
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));	
		}
	}

	//view
	public function view($id)
	{
		$cek1 = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek1->num_rows() == 1) {
			$data['title'] = 'Preview Pengajuan Sewa';
			$data['sewa'] = $cek1->row();
			$data['toko'] =$this->db->order_by('nama_toko', 'asc');
			$data['toko'] = $this->DButama->GetDB('tb_toko');
			$data['officer'] =$this->db->order_by('nama', 'asc');
			$data['officer'] = $this->DButama->GetDB('tb_officer');
			$data['pdft'] = $this->db->order_by('nama', 'asc');
			$data['pdft'] = $this->DButama->GetDB('tb_pendaftar');
			$this->load->view('officer/temp-header',$data);
			$this->load->view('officer/v_view-sewa',$data);
			$this->load->view('officer/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	//cetak
	public function cetak($id)
	{
		$cek1 = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek1->num_rows() == 1) {
			$data['title'] = 'Cetak Pengajuan Sewa';
			$data['sewa'] = $cek1->row();
			$data['toko'] =$this->db->order_by('nama_toko', 'asc');
			$data['toko'] = $this->DButama->GetDB('tb_toko');
			$data['officer'] =$this->db->order_by('nama', 'asc');
			$data['officer'] = $this->DButama->GetDB('tb_officer');
			$data['pdft'] = $this->db->order_by('nama', 'asc');
			$data['pdft'] = $this->DButama->GetDB('tb_pendaftar');
			$this->load->view('officer/temp-header',$data);
			$this->load->view('officer/v_cetak-sewa',$data);
			$this->load->view('officer/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	//edit
	// public function edit($id)
	// {
	// 	$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
	// 	if ($cek->num_rows() == 1) {
	// 		$data['title'] = 'Edit Pengajuan Sewa';
	// 		$data['sewa'] = $cek->row();
	// 		$data['pdft'] = $this->db->order_by('nama', 'asc');
	// 		$data['pdft'] = $this->DButama->GetDB('tb_pendaftar');
	// 		$data['toko'] = $this->db->order_by('nama_toko', 'asc');
	// 		$data['toko'] = $this->DButama->GetDB('tb_toko');
	// 		$this->load->view('officer/temp-header',$data);
	// 		$this->load->view('officer/v_edit-sewa',$data);
	// 		$this->load->view('officer/temp-footer');
	// 	}else{
	// 		redirect('error404','refresh');
	// 	}
	// }

	// public function prosesedit()
	// {
	// 	$where  = array('id' => $this->input->post('id'));
	// 	$query = $this->DButama->GetDBWhere($this->table,$where);
	// 	$row = $query->row();
	// 	$tgl_sewa = $this->input->post('tgl_sewa');
 //        $tgl_sewa = date('Y-m-d', strtotime($tgl_sewa));
 //        $tgl_selesai = $this->input->post('tgl_selesai');
 //        $tgl_selesai = date('Y-d-m', strtotime($tgl_selesai));
	// 	$data = array(
	// 		'id_pendaftar' => $this->input->post('id_pendaftar'),
	// 		'kd_toko' => $this->input->post('kd_toko'),
	// 		'tgl_sewa' => $tgl_sewa,
	// 		'jangka_sewa' => $this->input->post('jangka_sewa'),
	// 		'tgl_selesai' => $tgl_selesai,
	// 		'produk_jual' => $this->input->post('produk_jual'),
	// 		'total' => $this->input->post('total'),
	// 		'status' => $this->input->post('status')
	// 	);

	// 	$this->DButama->UpdateDB($this->table,$where,$data);
	// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
	// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	// 				<strong>Data Pengajuan sewa sudah diperbaharui</strong> 
	// 				</div>');
	// 	redirect('officer/sewa','refresh');
	// }

}

/* End of file Sewa.php */
/* Location: ./application/controllers/officer/Sewa.php */