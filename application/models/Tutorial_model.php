<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial_model extends CI_Model {

	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
        $company = 'member';
        $photo = 'default.png';
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'), 
						'password' => $pass,
						'company' => $company,
						'photo' => $photo);
		$insert = $this->db->insert('users',$object);
		if (!$insert && $this->db->_error_number()==1062) {
			echo "<script>alert('Username is already used'); </script>";
		}
	}

	public function insertTutorial($idUser)
	{
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'kat_id' => $this->input->post('kat_id'),
						'photo_hasil' => $this->upload->data('file_name'),
						'idUser' => $idUser);
		$this->db->insert('tutorial',$object);
	}

	public function getDataTutorial()
	{
		$this->db->select('*');
        $this->db->from('tutorial');
        $this->db->join('users', 'tutorial.idUser = users.id');
		$this->db->join('kategori_tutorial', 'tutorial.kat_id = kategori_tutorial.idKat');
		$this->db->where('idTutorial');
		$query = $this->db->get();
		if($query->num_rows()>0){	
            return $query->result();
        }	
	}

	public function getKatTutorial(){
        $query = $this->db->get('kategori_tutorial');
        if($query->num_rows()>0){	
            return $query->result();
        }
	}
	
	public function getStepTutorial(){
        $query = $this->db->get('step');
        if($query->num_rows()>0){	
            return $query->result();
        }
	}

	public function tutorial($nama_tutorial,$kat_id,$photo_hasil){
    	$this->db->select('*');
    	$this->db->from('tutorial');
    	$this->db->where('nama_tutorial',$nama_tutorial);
		$this->db->where('kat_id',$kat_id);
		$this->db->where('photo_hasil',$photo_hasil);
		$query =$this->db->get();
		// return $this->db->get()->row();
		if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
	}
	
	public function getTutorial($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tutorial');
		return $query->result();
	}

	public function updateById($id)
	{
		$idUser = $this->getUser($where);
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'foto_hasil' => $this->upload->data('file_name'),
						'idUser' => $this->input->post('$idUser'));
		$this->db->where('id',$id);
		$this->db->update('tutorial', $object);
	}

	public function deleteById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('tutorial');
	}

	public function list($limit, $start)
    {
        // $this->db->limit($limit, $start);
        $query = $this->db->get('tutorial', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	
	public function getTotal()
    {
        return $this->db->count_all('tutorial');
    }

	public function cari($keyword)
    {
    	$keyword    =   $this->input->post('cari'); 
        $query = $this->db->query("SELECT * FROM tutorial WHERE nama_tutorial LIKE '%$keyword%'");
        $this->db->like('nama_tutorial', $keyword);
        return $query->result();
	}
	
	public function show($id){
		$this->db->where('idTutorial',$id);
		$query=$this->db->get('tutorial');
		return $query->row();
	}

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */