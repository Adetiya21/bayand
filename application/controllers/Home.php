<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $table = 'tb_pendaftar';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('dftr_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("welcome").'")
			</script>';
			// redirect('admin/welcome');
		}
	}
	

	public function index()
	{
		$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $this->session->userdata('id')));
		$pdft = $this->session->userdata('id');
		if ($cek->num_rows() == 1) {
			$data['title'] = 'Dashboard Pendaftar';
			$data['profil'] = $cek->row();
			$data['menunggu'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Menunggu','id_pendaftar' => $pdft))->num_rows();
			$data['diterima'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Diterima','id_pendaftar' => $pdft))->num_rows();
			$data['ditolak'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Ditolak','id_pendaftar' => $pdft))->num_rows();
			$data['selesai'] = $this->DButama->GetDBWhere('tb_sewa', array('status' => 'Selesai','id_pendaftar' => $pdft))->num_rows();
			$data['all'] = $this->DButama->GetDB('tb_sewa')->num_rows();
			$this->load->view('pendaftar/temp-header',$data);
			$this->load->view('pendaftar/v_index',$data);
			$this->load->view('pendaftar/temp-footer');
		}else{
			redirect('error404','refresh');
		}

	}

	public function profil($id)
	{
		$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek->num_rows() == 1) {
			$data['title'] = 'Profil Pendaftar';
			$data['profil'] = $cek->row();
			$this->load->view('pendaftar/temp-header',$data);
			$this->load->view('pendaftar/v_profil',$data);
			$this->load->view('pendaftar/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	function edit_profil()
	{
		$this->load->library('form_validation');

		$config = array(
			array('field' => 'nama','label' => 'Nama','rules' => 'required',),
			array('field' => 'no_telp','label' => 'No.Telp','rules' => 'required|numeric',),
			array('field' => 'email','label' => 'Email','rules' => 'required|valid_email',),
			array('field' => 'username','label' => 'Username','rules' => 'required'),
			array('field' => 'password','label' => 'Password','rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/home/profil/'.$this->session->userdata('id').'','refresh');
		}else{
			$where  = array('id' => $this->input->post('id'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$pass=$this->input->post('password');
			$hash=password_hash($pass, PASSWORD_DEFAULT);
			$data = array(

				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => $hash
			);

			if(!empty($_FILES['foto_ktp']['name']))
			{
				$upload = $this->_do_upload();
				$data['foto_ktp'] = $upload;
			}

			$this->DButama->UpdateDB($this->table,$where,$data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Akun anda sudah diperbaharui</strong> 
						</div>');
			redirect('home/profil/'.$this->session->userdata('id').'','refresh');
		
		}
	}

	private function _do_upload()
	{
		$config['upload_path']   = 'assets/assets/img/ktp/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name']  = TRUE;
        $config['file_name']     = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto_ktp')) //upload and validate
        {
        	$this->session->set_flashdata('upload_error', 'Upload error: '.$this->upload->display_errors('',''));
        	// redirect('/home/profil/'.$this->session->userdata('id').'','refresh');
        }
        return $this->upload->data('file_name');
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */