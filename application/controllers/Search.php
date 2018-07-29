<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tutorial_model');
	}
	
	public function index()
	{   
        if($this->input->post('s')) {
            $data['results'] = $this->Tutorial_model->cari($this->input->post('s'));
            $this->load->view('search', $data);
        } else {
            redirect('home', 'refresh');
        }
	}
}
