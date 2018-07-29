<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->model('DataUserModel');
         $this->load->model('Tutorial_model');
         
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Admin') {
                redirect('home');
            }
        } else {
            redirect('Login');
        }
	}

    public function user()
    {
        $this->load->library('pdf');
    
        $parser['title'] = "Data User";
        $parser['users_list'] = $this->DataUserModel->getDataUser();
        $this->pdf->load_view('laporan', $parser);
    }

    public function tutorial()
    {
        $this->load->library('pdf');
    
        $parser['title'] = "Data Tutorial";
        $parser['tutorial_list'] = $this->Tutorial_model->_getAllTutorial();
        $this->pdf->load_view('laporan_tutorial', $parser);
    }

    public function html()
    {
        $data = [
            "title" => "User",
        ];
        
        $this->load->view('laporan', $data);
    }

}
