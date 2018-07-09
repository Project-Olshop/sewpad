<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	public function insertUser()
	{
		$object = array('username' => $this->input->post('nama'),
						'email' => $this->input->post('email'), 
						'password' => $this->input->post('password'));
						// 'foto' => $this->upload->data('file_name'));
		$this->db->insert('users',$object);
	}

	function login($username,$password){
    	$this->db->select('*');
    	$this->db->from('users');
    	$this->db->where('username',$username);
    	$this->db->where('password',$password);
    	return $this->db->get()->row();
	}
	
	public function getDataUser()
	{
		$query = $this->db->get('users');
		return $query->result();
		
	}

	public function getUser($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->result();
	}

	public function updateById($id)
	{
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'));
						// 'foto' => $this->upload->data('file_name'));
		$this->db->where('id',$id);
		$this->db->update('users', $object);
	}
	
	public function deleteById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('users');
	}

	public function list($limit, $start, $search)
    {
		// $this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->join('tutorial','tutorial.idTutorial=users.id');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('namaTutorial',$search);
		}
        $query = $this->db->get('users', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

	public function getTotal($search='')
    {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('tutorial','tutorial.id=users.id');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('namaTutorial',$search);
		}
        $query = $this->db->get('users', $search);
		return $this->db->count_all('users');
    }

    // public function cari($keyword)
    // {
	// 	$keyword    =   $this->input->post('cari'); 
    //     $query = $this->db->query("SELECT * FROM user WHERE namaUser LIKE '%$keyword%'");
    //     $this->db->like('namaUser', $keyword);
    //     return $query->result();
	// }    
	
	// public function getData($rowno,$rowperpage,$search="") {
 
	// 	$this->db->select('*');
	// 	$this->db->from('user');
	// 	if($search != ''){
	// 	  $this->db->like('title', $search);
	// 	  $this->db->or_like('content', $search);
	// 	}
	// 	$this->db->limit($rowperpage, $rowno); 
	// 	$query = $this->db->get();
	 
	// 	return $query->result_array();
	// }

	// public function getrecordCount($search = '') {

	// 	$this->db->select('count(*) as allcount');
	// 	$this->db->from('posts');
	 
	// 	if($search != ''){
	// 	  $this->db->like('title', $search);
	// 	  $this->db->or_like('content', $search);
	// 	}
	
	// 	$query = $this->db->get();
	// 	$result = $query->result_array();
	 
	// 	return $result[0]['allcount'];
	// }
 
}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */