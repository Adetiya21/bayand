<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pdft extends CI_Model {

	var $table = 'tb_pendaftar';

	public function json() {
		$this->datatables->select('id,nama,alamat,no_telp,email,foto_ktp,username,status');
		$this->datatables->from($this->table);
		// $this->datatables->add_column('foto_ktp','<div align="center"> <img src="'.base_url('assets/assets/img/ktp/').'$1" class="img-thumbnail" width="100%" height="100"></div>', 'foto_ktp');
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="javascript:void(0)" title="View" onclick="view($1)"> <span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}

	public function json1() {
		$this->datatables->select('id,nama,alamat,no_telp,email,foto_ktp,username,status');
		$this->datatables->from($this->table);
		// $this->datatables->add_column('foto_ktp','<div align="center"> <img src="'.base_url('assets/assets/img/ktp/').'$1" class="img-thumbnail" width="100%" height="100"></div>', 'foto_ktp');
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}

}

/* End of file M_pdft.php */
/* Location: ./application/models/M_pdft.php */