<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model {
    public function getKomentar(){
		$query = $this->db->get('komentar');
        if($query->num_rows()>0){
            return $query->result();
        }
	}
	public function saveKomentar()
    {
        $data = array(
            'komentar' => $this->input->post('komentar')
        );
        $this->db->insert('komentar',$data);
    } 

    public function updateKomentar()
    {
        $id = $this->input->post('idKomentar');

        $data = array(
            'komentar' => $this->input->post('komentar')
        );
         $this->db->where('idKomentar', $id);
        $this->db->update('komentar', $data);
    }

	public function deleteKomentar($id)
    {
        $this->db->where('idKomentar', $id);
        $this->db->delete('komentar');
    }

    public function _getAllKomentar() {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('idKomentar', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
}