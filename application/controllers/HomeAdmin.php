<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{	
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['company']=$session_data['company'];
		$data['id']=$session_data['id'];

		$this->load->model('User_model');
		$this->load->model('Admin_model');

		$id = $data['id'];
		$user = $data['username'];
		$data['username'] = $this->User_model->SelectAll($id,$user);
		$data['countUser'] = $this->Admin_model->getCountUser();
		$data['countTutorial'] = $this->Admin_model->getCountTutorial();
		$data['allTutorial'] = $this->Admin_model->getAllTutorial();

		//$this->load->model('user');
		//$id = $data['id'];
		//$user = $data['username'];
		//$data['name'] = $this->user->selectAll($id,$user);  
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$data);
	}

}
