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

	public function allTutorial(){
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
		$data['id']=$session_data['id'];
		$this->load->model('Tutorial');
		$data["tutorial_list"] = $this->Tutorial_model->getTutorial()();
		$data["cat_list"] = $this->Tutorial_model->getKatTutorial();
		$data['search']=$this->Tutorial_model->allEvents();
		$data['detail'] = 'All Tutorial';
		$this->load->view('home',$data);
}
}
