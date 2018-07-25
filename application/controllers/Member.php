<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
    } 
    
	public function index()
	{   
        if($this->session->userdata('logged_in')){
	        $session_data=$this->session->userdata('logged_in');
                $data['username']=$session_data['username'];
                $data['company']=$session_data['company'];
                $data['id']=$session_data['id'];
                $this->load->view('layouts/base_start_member',$data);
                $this->load->view('member/index' , $data);
                $this->load->view('layouts/base_end',$data);

		}else{
                $this->load->view('home');
                // $this->load->view('user/footer',$data);
		}
		// $this->load->view('member/index');
    }
    
}
