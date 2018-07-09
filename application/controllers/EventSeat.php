<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventSeat extends CI_Controller {

	public function byID($idVenue)
	{
		$this->load->helper('url');
		$data['idVenue'] = $idVenue;
		$this->load->model('EventVenueModel');
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->model('EventSeatModel');
		$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/seatEvent', $data);
	}

	public function create($idVenue)
	{
		$this->load->helper('url','form');
		$this->load->model('EventVenueModel');
		$data['idVenue'] = $idVenue;
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->model('EventSeatModel');
		$this->EventSeatModel->insertSeat($idVenue);
		$this->EventVenueModel->getVenue($idVenue);
		echo "<script>alert('Successfully Created'); </script>";
		$this->load->model('EventVenueModel');
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->model('EventSeatModel');
		$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/seatEvent', $data);
	}

	public function update($idVenue)
	{

		$this->load->model('EventSeatModel');
		$this->load->model('EventVenueModel');
		$data['idVenue'] = $idVenue;
		$idSeat = $this->input->post('id');
		$this->EventSeatModel->updateById($idSeat);
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$data['seat'] = $this->EventSeatModel->getSeat($idSeat);
			//echo "<script>alert('Successfully Updated'); </script>";
			$data['event'] = $this->EventVenueModel->getVenue($idVenue);
			$this->load->model('EventSeatModel');
			$data['event'] = $this->EventVenueModel->getVenue($idVenue);
			$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
			$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/seatEvent', $data);
	}

	public function deleteData($idVenue,$idSeat)
	{
		$this->load->helper("url");
		$this->load->model("EventSeatModel");
		$this->EventSeatModel->delete($idSeat);
		echo "<script>alert('Successfully Deleted'); </script>";
		$this->load->model('EventVenueModel');
		$this->load->model('EventSeatModel');
		$data['idVenue'] = $idVenue;
		$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/seatEvent', $data);
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
 ?>