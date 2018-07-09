<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventPrice extends CI_Controller {

	public function byID($idSchedule)
	{
		$this->load->helper('url');
		$data['idSchedule'] = $idSchedule;
		$this->load->model('EventScheduleModel');
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
		$this->load->model('EventPriceModel');
		$data['price_list'] = $this->EventPriceModel->getPriceById($idSchedule);
		$data['seat'] = $this->EventPriceModel->getSeat($idSchedule);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/priceEvent', $data);
	}

	public function create($idSchedule)
	{
		$this->load->helper('url','form');
		$this->load->model('EventScheduleModel');
		$this->load->model('EventPriceModel');

		$fkid = $this->input->post('seat');
		$data['idSchedule'] = $idSchedule;
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
		
		$this->EventPriceModel->insertPrice($fkid,$idSchedule);
		$this->EventScheduleModel->getSchedule($idSchedule);
		echo "<script>alert('Successfully Created'); </script>";
		$data['price_list'] = $this->EventPriceModel->getPriceById($idSchedule);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/priceEvent', $data);
	}

	public function update($idSchedule)
	{

		$this->load->model('EventPriceModel');
		$this->load->model('EventScheduleModel');
		$data['idSchedule'] = $idSchedule;
		$idPrice = $this->input->post('id');
		$this->EventPriceModel->updateById($idPrice);
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
			echo "<script>alert('Successfully Updated'); </script>";
			$data["price_list"] = $this->EventPriceModel->getPriceById($idSchedule);
			$data['seat'] = $this->EventPriceModel->getSeat($idSchedule);
			$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/priceEvent', $data);
	}

	public function deleteData($idSchedule,$idPrice)
	{
		$this->load->helper("url");
		$this->load->model("EventPriceModel");
		$this->load->model('EventScheduleModel');

		$this->EventPriceModel->delete($idPrice);
		echo "<script>alert('Successfully Deleted'); </script>";
		$data['idSchedule'] = $idSchedule;
		$data["price_list"] = $this->EventPriceModel->getPriceById($idSchedule);
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
		$data['seat'] = $this->EventPriceModel->getSeat($idSchedule);
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/priceEvent', $data);
	}

}


/* End of file EventPrice.php */
/* Location: ./application/controllers/EventPrice.php */