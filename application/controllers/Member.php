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
       
		$this->load->view('member/index');
    }
    
}