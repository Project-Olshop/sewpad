<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
    }
    
	public function index()
	{   
        $session_id=$this->session->userdata('user');

        if(empty($session_id)){
            redirect('/auth');
        }
        $data['user']=$session_id;
		$this->load->view('user', $data);
    }
    
}
