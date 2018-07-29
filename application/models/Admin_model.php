<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	public function getCountUser(){
		$query = $this->db->query("SELECT COUNT(id) as id from users where company ='member'");
		return $query->result();
	}

	public function getCountTutorial(){
		$query = $this->db->query("SELECT nama_Tutorial from tutorial");
		return $query->result();
	}

	public function getAllTutorial(){
		$query = $this->db->query("SELECT * from tutorial  
        inner join kategori_tutorial on tutorial.kat_id = kategori_tutorial.idKat  
        inner join users on tutorial.idUser = users.id ");
		if($query->num_rows()>0){
				return $query->result();
		}else{
			return "empty";
			exit;
		}

	}

	public function _getAllMember() {
		$query = $this->db->where('company', 'member');
		$query = $this->db->get('users');

		return $query->result_array();
	}

	public function _getAllTutorial() {
		$query = $this->db->get('tutorial');

		return $query->result_array();
	}

	public function _getAllKategori() {
		$query = $this->db->get('kategori_tutorial');

		return $query->result_array();
	}

	public function _getCountKategoriOnTutorial($idKat) {
		$query = $this->db->where('kat_id', $idKat);
		$query = $this->db->get('tutorial');

		return $query->result_array();
	}
}