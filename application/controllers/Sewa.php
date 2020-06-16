<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	var $tableuser = 'tb_pendaftar'; 
	var $table = 'tb_sewa';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('dftr_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("welcome").'")
			</script>';
		}
		$this->load->model('m_sewa','Model');
	}

	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	public function index()
	{
		$cek = $this->DButama->GetDBWhere($this->tableuser,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$data['title'] = 'Data Pengajuan Sewa';
			$data['profil'] = $cek->row();
			$this->load->view('pendaftar/temp-header',$data);
			$this->load->view('pendaftar/v_sewa');
			$this->load->view('pendaftar/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	//input
	public function input()
	{
		$cek = $this->DButama->GetDBWhere($this->tableuser,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$data['title'] = 'Input Pengajuan Sewa';
			$data['profil'] = $cek->row();
			$data['toko'] =$this->db->order_by('nama_toko', 'asc');
			$data['toko'] = $this->DButama->GetDB('tb_toko');
			$this->load->view('pendaftar/temp-header',$data);
			$this->load->view('pendaftar/v_input-sewa',$data);
			$this->load->view('pendaftar/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	//proses
	public function proses()
	{
		$tgl_sewa = $this->input->post('tgl_sewa');
        $tgl_sewa = date('Y-m-d', strtotime($tgl_sewa));
        $tgl_selesai = $this->input->post('tgl_selesai');
        // $tgl_selesai = date('Y-m-d', strtotime($tgl_selesai));
		
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
			'status' => 'Menunggu'
		);

		$foto_gerobak = $_FILES['foto_gerobak']['name'];
		if(!empty($foto_gerobak))
		{
			$upload = $this->_do_upload();
			$data['foto_gerobak'] = $upload;
		}

		$this->DButama->AddDB($this->table,$data);
		redirect('sewa','refresh');
	}

	//edit
	public function edit($id)
	{
		$cek = $this->DButama->GetDBWhere($this->tableuser,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$cek1 = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
			if ($cek1->num_rows() == 1) {
				$data['title'] = 'Edit Pengajuan Sewa';
				$data['profil'] = $cek->row();
				$data['sewa'] = $cek1->row();
				$data['toko'] =$this->db->order_by('nama_toko', 'asc');
				$data['toko'] = $this->DButama->GetDB('tb_toko');
				$this->load->view('pendaftar/temp-header',$data);
				$this->load->view('pendaftar/v_edit-sewa',$data);
				$this->load->view('pendaftar/temp-footer');
			}else{
				redirect('error404','refresh');
			}
		}else{
			redirect('error404','refresh');
		}
	}

	public function prosesedit()
	{
		$where  = array('id' => $this->input->post('id'));
		$query = $this->DButama->GetDBWhere($this->table,$where);
		$row = $query->row();
		$tgl_sewa = $this->input->post('tgl_sewa');
        $tgl_sewa = date('Y-m-d', strtotime($tgl_sewa));
        $tgl_selesai = $this->input->post('tgl_selesai');
        $tgl_selesai = date('Y-d-m', strtotime($tgl_selesai));
		$data = array(
			'id_pendaftar' => $this->input->post('id_pendaftar'),
			'kd_toko' => $this->input->post('kd_toko'),
			'tgl_sewa' => $tgl_sewa,
			'jangka_sewa' => $this->input->post('jangka_sewa'),
			'tgl_selesai' => $tgl_selesai,
			'kebutuhan' => $this->input->post('kebutuhan'),
			'produk_jual' => $this->input->post('produk_jual'),
			'total' => $this->input->post('total')
		);

		$foto_gerobak = $_FILES['foto_gerobak']['name'];
		if(!empty($foto_gerobak))
		{
			$upload = $this->_do_upload();
			$data['foto_gerobak'] = $upload;
		}
		
		$this->DButama->UpdateDB($this->table,$where,$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Data pengajuan sewa sudah diperbaharui</strong> 
					</div>');
		redirect('sewa','refresh');
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

	//view
	public function view($id)
	{
		$cek = $this->DButama->GetDBWhere($this->tableuser,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$cek1 = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
			if ($cek1->num_rows() == 1) {
				$data['title'] = 'Preview Pengajuan Sewa';
				$data['profil'] = $cek->row();
				$data['sewa'] = $cek1->row();
				$data['toko'] =$this->db->order_by('nama_toko', 'asc');
				$data['toko'] = $this->DButama->GetDB('tb_toko');
				$data['officer'] =$this->db->order_by('nama', 'asc');
				$data['officer'] = $this->DButama->GetDB('tb_officer');
				$this->load->view('pendaftar/temp-header',$data);
				$this->load->view('pendaftar/v_view-sewa',$data);
				$this->load->view('pendaftar/temp-footer');
			}else{
				redirect('error404','refresh');
			}
		}else{
			redirect('error404','refresh');
		}
	}

	//cetak
	public function cetak($id)
	{
		$cek = $this->DButama->GetDBWhere($this->tableuser,array('id'=> $this->session->userdata('id')));
		if ($cek->num_rows() == 1) {
			$cek1 = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
			if ($cek1->num_rows() == 1) {
				$data['title'] = 'Cetak Pengajuan Sewa';
				$data['profil'] = $cek->row();
				$data['sewa'] = $cek1->row();
				$data['toko'] =$this->db->order_by('nama_toko', 'asc');
				$data['toko'] = $this->DButama->GetDB('tb_toko');
				$data['officer'] =$this->db->order_by('nama', 'asc');
				$data['officer'] = $this->DButama->GetDB('tb_officer');
				$this->load->view('pendaftar/temp-header',$data);
				$this->load->view('pendaftar/v_cetak-sewa',$data);
				$this->load->view('pendaftar/temp-footer');
			}else{
				redirect('error404','refresh');
			}
		}else{
			redirect('error404','refresh');
		}
	}

	private function _do_upload()
	{
		$config['upload_path']   = 'assets/assets/img/gerobak/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name']  = TRUE;
        $config['file_name']     = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto_gerobak')) //upload and validate
        {
        	$this->session->set_flashdata('upload_error', 'Upload error: '.$this->upload->display_errors('',''));
        	// redirect('/home/profil/'.$this->session->userdata('id').'','refresh');
        }
        return $this->upload->data('file_name');
    }

}

/* End of file Sewa.php */
/* Location: ./application/controllers/Sewa.php */