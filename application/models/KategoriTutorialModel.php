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
            'category'          => $this->input->post('category'),
            'description'   => $this->input->post('description')
        );
        $this->db->insert('kategori_tutorial',$data);
    } 

    public function updateKategori($id)
    {
        $data = array(
            'category'          => $this->input->post('category'),
            'description'   => $this->input->post('description')
        );
         $this->db->where('idCat', $id);
        $this->db->update('kategori_tutorial', $data);
    }

	public function deleteKategori($id)
    {
        $this->db->where('idCat', $id);
        $this->db->delete('kategori_tutorial');
    }

}

/* End of file kategori_tutorialModel.php */
/* Location: ./application/models/kategori_tutorialModel.php */