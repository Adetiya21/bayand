<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_officer extends CI_Model {

	var $table = 'tb_officer';

	public function json() {
		$this->datatables->select('nik,nama,no_telp,password');
		$this->datatables->from($this->table);
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'nik');
		return $this->datatables->generate();
	}

	public function json1() {
		$this->datatables->select('nik,nama,no_telp,password');
		$this->datatables->from($this->table);
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="javascript:void(0)" title="View" onclick="edit($1)"> <span class="fa fa-eye"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm disabled" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'nik');
		return $this->datatables->generate();
	}

}

/* End of file M_officer.php */
/* Location: ./application/models/M_officer.php */