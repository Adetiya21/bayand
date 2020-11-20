<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdft extends CI_Controller {

	var $table = 'tb_pendaftar';

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('officer_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("officer/welcome").'")
			</script>';
		}
		$this->load->model('m_pdft','Model');
	}

	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json1();
		}
	}

	public function index()
	{
		$title = array('title' => 'Data Pendaftar', );
		$this->load->view('officer/temp-header',$title);
		$this->load->view('officer/v_pdft');
		$this->load->view('officer/temp-footer');
	}

	public function input()
	{
		$title = array('title' => 'Data Pendaftar', );
		$this->load->view('officer/temp-header',$title);
		$this->load->view('officer/v_input-pdft');
		$this->load->view('officer/temp-footer');
	}

	//proses
	public function proses()
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
			redirect('officer/pdft/input','refresh');
		}else{
			$DataUser  = array('username' => $this->input->post('username'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				$this->session->set_flashdata('error', 'Username Sudah Ada / Tidak Boleh Duplikat');
				redirect('officer/pdft/input','refresh');
			}else{
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
				
				$foto_ktp = $_FILES['foto_ktp']['name'];
				if(!empty($foto_ktp))
				{
					$upload = $this->_do_upload();
					$data['foto_ktp'] = $upload;
				}

				$this->DButama->AddDB($this->table,$data);
				redirect('officer/pdft','refresh');
			}
		}
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
					'status' => $this->input->post('status')
				);
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));	
		}
	}

	private function _do_upload()
	{
		$config['upload_path']   = 'assets/assets/img/ktp/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
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

/* End of file Pdft.php */
/* Location: ./application/controllers/officer/Pdft.php */