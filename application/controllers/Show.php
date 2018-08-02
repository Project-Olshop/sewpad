<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		//Do your magic here
		$this->load->helper('url','form');
        $this->load->model('Tutorial_model');
		$this->load->library('pagination','form_validation');
    }
    
    public function showTutorial($idTutorial)
	{
        $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
		$data['tutorial'] = $this->Tutorial_model->show($idTutorial);
		$data['step'] = $this->Tutorial_model->getStep($idTutorial);
		$this->load->view('tutorial/show', $data);
    }
    
    public function index()
	{
        $this->load->model('User_model');
        $total=$this->User_model->getTutorialHome();
        $config['base_url'] = base_url() . "home/index";
        $config['total_rows'] = $total;
        $config['per_page'] = 3;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config);
 
        $this->load->model('m_home');
        $data['results'] = $this->m_home->getAll($config);
        $this->load->view('home', $data);
        }
}