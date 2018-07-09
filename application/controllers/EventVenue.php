<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventVenue extends CI_Controller {

	public function index()
	{
		$this->load->model('EventVenueModel');
		$data["venue_list"] = $this->EventVenueModel->getAllVenue();
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/venueSeat', $data);
	}




}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */