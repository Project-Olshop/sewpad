<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
    }
    
	public function index()
	{   
        $session_id=$this->session->tipe;

        if($session_id != 'admin'){
            redirect('auth/');
        }
        $data['admin']=$session_id;
		$this->load->view('admin/index', $data);
    }
    
}
