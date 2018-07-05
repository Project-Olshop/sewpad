<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	
	public function index()
	{
		$user = $this->User_model
    	->getDataUser();
		$data = [
			'title' => 'Home',
			'users' => $user
			];
		$this->load->view('home', $data);
	}
}
