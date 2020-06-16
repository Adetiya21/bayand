<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_toko extends CI_Model {

	var $table = 'tb_toko';

	public function json() {
		$this->datatables->select('kd_toko,nama_toko,alamat_toko,
			CONCAT("Rp. ", harga_sewa) as harga_sewa');
		$this->datatables->from($this->table);
		return $this->datatables->generate();
	}

}

/* End of file M_toko.php */
/* Location: ./application/models/M_toko.php */