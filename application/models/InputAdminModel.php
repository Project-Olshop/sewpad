<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputAdminModel extends CI_Model {
	 public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAdmin()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('company', 'admin');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }                        
    }

    public function save()
    {	
    	$password = $this->input->post('password');
        $pass = md5($password);
        $level = 'admin';
        $pic = 'default.png';
            $object = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $pass,
                'company' => $company,
                'photo'  => $pic
            );

            $this->db->insert('users', $object);
    } 

    public function updateNoPass($id)
    {	
            	$object = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
            );
            $this->db->where('id', $id);
            $this->db->update('users', $object);

    }

    public function updateProfile($id)
    {	
    	$password = $this->input->post('password');
        $pass = md5($password);

            	$object = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $pass,
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


    public function getAdminNamebyID($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function deleteAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}
/* End of file modelName.php */
/* Location: ./application/models/modelName.php */