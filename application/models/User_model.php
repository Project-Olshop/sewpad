<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function login($username,$password){
    	$this->db->select('id,username,email,password,company');
    	$this->db->from('users');
    	$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$query =$this->db->get();
		// return $this->db->get()->row();
		if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
	}

	public function getTutorialHome(){
		return $this->db->query("select `t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username` from ((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`) where ((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`))")->num_rows();
	}

	public function getTutorialMember($username){
		$this->db->select("`t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username`");
        $this->db->where("((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`)) and `u`.`username` = '$username'");
        $this->db->from("((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`)"); 
		$query = $this->db->get();
		return $query;
	}
	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
        $company = 'Member';
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

	public function register($username){
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
	
	public function selectAll($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
	}
	
	public function getDataUser()
	{
		$query = $this->db->get('users');
		return $query->result();
		
	}

	public function getUser($id)
	{
		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('company', 'users');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	public function updateNoPass($id)
	{
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'));
		$this->db->where('id',$id);
		$this->db->update('users', $object);
	}
	
	public function updatePass($id)
    {   
        $password = $this->input->post('password');
        $pass = md5($password);

                $object = array(
                'password' => $pass
            );
            $this->db->where('id', $id);
            $this->db->update('users', $object);

	}
	
	public function updatePic($id)
    {   
                $object = array(
                'photo' => $this->upload->data('file_name')
            );
            $this->db->where('id', $id);
            $this->db->update('users', $object);

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
}
?>