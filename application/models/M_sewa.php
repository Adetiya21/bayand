<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sewa extends CI_Model {

	var $table = 'tb_sewa';

	public function json() {
		$this->datatables->select('tb_sewa.id,
			tb_sewa.id_pendaftar,
			tb_sewa.kd_toko,
			CONCAT(tb_sewa.tgl_sewa," --- ",tb_sewa.tgl_selesai) as tgl,
			CONCAT(tb_sewa.jangka_sewa," Bulan ") as js,			
			tb_sewa.produk_jual,
			tb_sewa.status,
			tb_toko.kd_toko,
			tb_toko.nama_toko,
			');
		// $this->datatables->select('id,id_pendaftar,kd_toko,tgl_sewa,jangka_sewa,tgl_selesai,produk_jual,status');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_toko', 'tb_sewa.kd_toko=tb_toko.kd_toko');
		$this->datatables->where('id_pendaftar', $this->session->userdata('id'));
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="'.site_url('sewa/view/$1').'" ><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="'.site_url('sewa/edit/$1').'" ><span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" onclick="hapus($1)" ><span class="fa fa-trash"></span></a>
			</div>', 'id');
		$this->datatables->group_by("tb_sewa.id");
		return $this->datatables->generate();
	}

	public function json_admin() {
		$this->datatables->select('tb_sewa.id,
			tb_sewa.id_pendaftar,
			tb_sewa.kd_toko,
			CONCAT(tb_sewa.tgl_sewa," --- ",tb_sewa.tgl_selesai) as tgl,
			CONCAT(tb_sewa.jangka_sewa," Bulan ") as js,			
			tb_sewa.produk_jual,
			tb_sewa.status,
			tb_toko.kd_toko,
			tb_toko.nama_toko,
			tb_pendaftar.nama
			');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_toko', 'tb_sewa.kd_toko=tb_toko.kd_toko');
		$this->datatables->join('tb_pendaftar', 'tb_sewa.id_pendaftar=tb_pendaftar.id');
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="'.site_url('admin/sewa/view/$1').'" ><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="'.site_url('admin/sewa/edit/$1').'" ><span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" onclick="hapus($1)" ><span class="fa fa-trash"></span></a>
			</div>', 'id');
		$this->datatables->group_by("tb_sewa.id");
		return $this->datatables->generate();
	}

	public function json_admin1() {
		$this->datatables->select('tb_sewa.id,
			tb_sewa.id_pendaftar,
			tb_sewa.kd_toko as kd_toko1,
			tb_sewa.tgl_selesai as tglselesai,
			CONCAT(tb_sewa.tgl_sewa," --- ",tb_sewa.tgl_selesai) as tgl,
			CONCAT(tb_sewa.jangka_sewa," Bulan ") as js,			
			tb_sewa.produk_jual as prjual,
			tb_sewa.status,
			tb_sewa.total as tot,
			tb_toko.kd_toko,
			tb_toko.nama_toko,
			tb_toko.alamat_toko as at,
			tb_pendaftar.nama
			');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_toko', 'tb_sewa.kd_toko=tb_toko.kd_toko');
		$this->datatables->join('tb_pendaftar', 'tb_sewa.id_pendaftar=tb_pendaftar.id');
		$this->datatables->where('tb_sewa.status', 'Diterima');
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="'.site_url('admin/sewa/view/$1').'" ><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="'.site_url('admin/sewa/edit/$1').'" ><span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" onclick="hapus($1)" ><span class="fa fa-trash"></span></a>
			</div>', 'id');
		$this->datatables->group_by("tb_sewa.id");
		return $this->datatables->generate();
	}

	public function json_officer() {
		$this->datatables->select('tb_sewa.id,
			tb_sewa.id_pendaftar,
			tb_sewa.kd_toko,
			CONCAT(tb_sewa.tgl_sewa," --- ",tb_sewa.tgl_selesai) as tgl,
			CONCAT(tb_sewa.jangka_sewa," Bulan ") as js,			
			tb_sewa.produk_jual as prjual,
			tb_sewa.status,
			tb_toko.kd_toko,
			tb_toko.nama_toko,
			tb_pendaftar.nama
			');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_toko', 'tb_sewa.kd_toko=tb_toko.kd_toko');
		$this->datatables->join('tb_pendaftar', 'tb_sewa.id_pendaftar=tb_pendaftar.id');
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-primary btn-rounded btn-sm" href="'.site_url('officer/sewa/view/$1').'" ><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" onclick="edit($1)"><span class="fa fa-edit"></span></a>
			</div>', 'id');
		$this->datatables->group_by("tb_sewa.id");
		return $this->datatables->generate();
	}

}

/* End of file M_sewa.php */
/* Location: ./application/models/M_sewa.php */