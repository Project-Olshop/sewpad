<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model {
    public function _getAllKomentar() {
		$query = $this->db->order_by('idKomentar', 'DESC');
		$query = $this->db->get('komentar');

		return $query->result_array();
	}

	public function _deleteKomentar($id) {
		$this->db->where('idKomentar', $id);
        $this->db->delete('komentar');
	}
}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */