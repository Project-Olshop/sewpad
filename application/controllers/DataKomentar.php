<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKomentar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komentar_model');

		if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Admin') {
                redirect('home');
            }
        } else {
            redirect('Login');
        }
		
	}
	
	public function index()
	{
        $data['komentar'] = $this->Komentar_model->_getAllKomentar();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/dataKomentar', $data);
    }

    public function delete($id)
	{
		$this->Komentar_model->_deleteKomentar($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('DataKomentar','refresh');
	}

}