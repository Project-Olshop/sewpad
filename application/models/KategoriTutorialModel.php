<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriTutorialModel extends CI_Model {
	public function getKategori(){
		$query = $this->db->get('kategori_tutorial');
        if($query->num_rows()>0){
            return $query->result();
        }
	}
	public function saveKategori()
    {
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'deskripsi'=> $this->input->post('deskripsi')
        );
        $this->db->insert('kategori_tutorial',$data);
    } 

    public function updateKategori()
    {
        $id = $this->input->post('idKat');

        $data = array(
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        );
         $this->db->where('idKat', $id);
        $this->db->update('kategori_tutorial', $data);
    }

	public function deleteKategori($id)
    {
        $this->db->where('idKat', $id);
        $this->db->delete('kategori_tutorial');
    }

    public function _getAllKategori() {
        $query = $this->db->get('kategori_tutorial');

        return $query->result_array();
    }

}

/* End of file kategori_tutorialModel.php */
/* Location: ./application/models/kategori_tutorialModel.php */