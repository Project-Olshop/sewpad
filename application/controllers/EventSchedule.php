<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventSchedule extends CI_Controller {

	public function index()
	{
		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/scheduleEvent', $data);
	}

	public function allData(){
		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/addSchedule', $data);
	}

	public function getDataID($id){
		$this->load->model('EventScheduleModel');
		$data["list"] = $this->EventScheduleModel->getSchedule($id);
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/scheduleDetail', $data);

	}

	public function addData(){
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();

		$this->form_validation->set_rules('event_id', 'Name Event', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('artist_id', 'Artist', 'trim|required');
		$this->form_validation->set_rules('venue_id', 'Venue Name', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('startTime', 'Start Time', 'trim|required');
		$this->form_validation->set_rules('endTime', 'End Time', 'trim|required');

		if ($this->form_validation->run()==FALSE){
			$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/addSchedule', $data);

		}else{
			$this->EventScheduleModel->saveAll();
			echo "<script>alert('Successfully Created'); </script>";
			$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/addSchedule', $data);
		}
		
	}

	public function updateData($id){
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventScheduleModel');
		$data["list"] = $this->EventScheduleModel->getSchedule($id);
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();

		$this->form_validation->set_rules('event_id', 'Name Event', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('artist_id', 'Artist', 'trim|required');
		$this->form_validation->set_rules('venue_id', 'Venue Name', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('startTime', 'Start Time', 'trim|required');
		$this->form_validation->set_rules('endTime', 'End Time', 'trim|required');

		if ($this->form_validation->run()==FALSE){
			echo validation_errors();
		}else{
			$this->EventScheduleModel->update($id);
			echo "<script>alert('Successfully Updated'); </script>";
			$this->load->model('EventScheduleModel');
			$data["list"] = $this->EventScheduleModel->getSchedule($id);
			$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/scheduleDetail', $data);	
		}
	}

	public function deleteData($id)
    {
        $this->load->model('EventScheduleModel');
        $this->EventScheduleModel->delete($id);
        echo "<script>alert('Successfully Deleted'); </script>";
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
		$this->load->view('admin/scheduleEvent', $data);
    }

}