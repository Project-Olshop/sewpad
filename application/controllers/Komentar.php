<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Member') {
                redirect('HomeAdmin');
            }
        } else {
            redirect('Login');
        }
    }

    public function index()
	{
		$session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
        $data['title'] = 'Komentar';

        $this->load->model('Komentar_model');
        $id = $data['id'];
        $data['username'] = $this->Komentar_model->selectAll($id);

        $username = $data['username'];
        $query=$this->Komentar_model->getKomentarMember($username);

        $data['komentar'] = $query->result_array();

        // $this->load->model('EventScheduleModel');
        // $data["artist_list"] = $this->User_model->getArtistOption();
        // $data["cat_list"] = $this->Eodel->getCatOption();

        $this->load->view('layouts/base_start_member', $data);
        $this->load->view('member/komentar', $data);
        $this->load->view('layouts/base_end'); 
    }
    
    public function create()
    {
        $this->Komentar_model->saveKomentar();
        echo "<script>alert('Successfully Created'); </script>";
        redirect('Komentar','refresh');
    }
}