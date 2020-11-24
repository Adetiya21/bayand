<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $table = 'tb_pendaftar';

	function __construct()
	{
		parent::__construct(); 
	}

	public function get_tokens($value="") {
		if ($this->session->userdata('bayand') == "SudahMasukMas") {
			echo $this->security->get_csrf_hash();
		}
	}

	public function index()
	{
		$this->load->view('pendaftar/v_login');
	}

	public function login()
	{
		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		if (!isset($response['success']) || $response['success'] <> true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Klik Recaptcha</strong> 
				</div>');
			redirect('welcome','refresh');
		} else {
			$this->load->library('form_validation');
			$config = array(
				array('field' => 'username','label' => "Username",'rules' => 'required' ),
				array('field' => 'password','label' => 'Password','rules' => 'required' )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('username', set_value('username') );
				$this->session->set_flashdata('password', set_value('password') );
				$this->session->set_flashdata('error', validation_errors());
				redirect('welcome','refresh');
			}else{
				$query = $this->DButama->GetDBWhere('tb_pendaftar', array('username' => $this->input->post('username'), ));
				if ($query->num_rows() == 0 ) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Username / Password Tidak Ada</strong> 
						</div>');
					redirect('welcome','refresh');
				}else{
					$hasil = $query->row();
					if (password_verify($this->input->post('password'), $hasil->password)) {
						foreach ($query->result() as $key ) {
							$sess_data['dftr_logged_in'] = "Sudah_Loggin";
							$sess_data['nama'] = $key->nama;
							$sess_data['username'] = $key->username;
							$sess_data['id'] = $key->id;
							$this->session->set_userdata($sess_data);
							$this->session->unset_userdata('officer_logged_in');
							$this->session->unset_userdata('admin_logged_in');
							redirect('home', 'refresh');
						}
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Username / Password Tidak Ada</strong> 
							</div>');
						redirect('welcome','refresh');
					}
				}
			}
		}
	}

	function logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		redirect('welcome','refresh');
	}

	public function form_daftar()
	{
		$this->load->view('pendaftar/v_daftar');
	}

	function daftar()
	{
		$this->load->library('form_validation');

		$config = array(
			array('field' => 'nama','label' => 'Nama Sesuai KTP','rules' => 'required',),
			array('field' => 'username','label' => 'Username','rules' => 'required'),
			array('field' => 'password','label' => 'Password','rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('welcome/form_daftar','refresh');
		}else{
			$DataUser  = array('username' => $this->input->post('username'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				// $this->_Values();
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Username sudah terdaftar</strong> 
							</div>');
				redirect('welcome/form_daftar','refresh');
			}else{
				$pass=$this->input->post('password');
				$hash=password_hash($pass, PASSWORD_DEFAULT);
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $hash
				);

				$this->DButama->AddDB($this->table,$data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Akun anda sudah terdaftar, silahkan lakukan login</strong> 
							</div>');
				redirect('welcome','refresh');
			}
		}
	}
}
