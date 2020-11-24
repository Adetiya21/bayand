<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('officer/v_login');
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
			redirect('officer','refresh');
		} else {
			$this->load->library('form_validation');
			$config = array(
				array('field' => 'nik','label' => "nik",'rules' => 'required' ),
				array('field' => 'password','label' => 'Password','rules' => 'required',)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('nik', set_value('nik') );
				$this->session->set_flashdata('password', set_value('password') );
				$this->session->set_flashdata('error', validation_errors());
				redirect('officer','refresh');
			}else{
				$query = $this->DButama->GetDBWhere('tb_officer', array('nik' => $this->input->post('nik'), ));
				if ($query->num_rows() == 0 ) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>NIK / Password Tidak Ada</strong> 
						</div>');
					redirect('officer','refresh');
				}else{
					$hasil = $query->row();
					if (password_verify($this->input->post('password'), $hasil->password)) {
						foreach ($query->result() as $key ) {
							$sess_data['officer_logged_in'] = "Sudah_Loggin";
							$sess_data['nama'] = $key->nama;
							$sess_data['nik'] = $key->nik;
							$this->session->set_userdata($sess_data);
							$this->session->unset_userdata('dftr_logged_in');
							$this->session->unset_userdata('admin_logged_in');
							redirect('officer/home', 'refresh');
						}
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>NIK / Password Tidak Ada</strong> 
							</div>');
						redirect('officer','refresh');
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
		redirect('officer/welcome','refresh');
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/officer/Welcome.php */