<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriTutorial extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriTutorialModel');

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
        $this->load->model('KategoriTutorialModel');
        $data['kategori'] = $this->KategoriTutorialModel->_getAllKategori();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/kategoriTutorial', $data);
    }

    public function create()
    {
        // $this->load->helper('url','form');
        // $this->load->library('form_validation');
        // $this->load->model('EventArtistModel');

        // $this->form_validation->set_rules('name', 'Name', 'trim|required');
        // $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        // if ($this->form_validation->run()==FALSE){
        //     echo validation_errors();
        // }else{

        //     $config['upload_path']='./assets/imgEvent/';
        //     $config['allowed_types']='gif|jpg|png';
        //     $config['max_size']=1000000000;
        //     $config['max_width']=10240;
        //     $config['max_height']=7680;

        //     $this->load->library('upload', $config);
        //     if (! $this->upload->do_upload('pict')) {
        //         $error = array('error' => $this->upload->display_errors());
        //     } else {
        //         $this->EventNameModel->save();
        //         echo "<script>alert('Successfully Created'); </script>";
        //         redirect('EventArtist','refresh');
        //     }
        // }

        $this->KategoriTutorialModel->saveKategori();
        echo "<script>alert('Successfully Created'); </script>";
        redirect('KategoriTutorial','refresh');
    }

    public function update()
    {
        // $this->load->helper('url','form');
        // $this->load->library('form_validation');
        // $this->load->model('EventArtistModel');
        // $this->form_validation->set_rules('name', 'Event Artist', 'trim|required');
        // $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        
        // $id = $this->input->post('id');

        // if ($this->form_validation->run()==FALSE){

        // }else{

        //     $config['upload_path']='./assets/imgEvent/';
        //     $config['allowed_types']='gif|jpg|png';
        //     $config['max_size']=1000000000;
        //     $config['max_width']=10240;
        //     $config['max_height']=7680;

        //     $this->load->library('upload', $config);
        //     if (! $this->upload->do_upload('pict')) {
        //         $this->EventArtist->updateno($id);
        //         echo "<script>alert('Successfully Updated'); </script>";
        //         redirect('EventArtist','refresh');
                
        //     }else{
                
        //         $this->EventArtist->updateArtist($id);
        //         echo "<script>alert('Successfully Updated'); </script>";
        //         redirect('EventArtist','refresh');
        //     }
        // }

        $this->KategoriTutorialModel->updateKategori();
        echo "<script>alert('Successfully Updated'); </script>";
        redirect('KategoriTutorial','refresh');
    }

    public function delete($id)
    {
        // $this->load->model('EventArtistModel');
        //$id = $this->uri->segment(3);
        // $this->EventArtist->deleteArtist($id);
        // redirect('EventArtist','refresh');

        $this->KategoriTutorialModel->deleteKategori($id);
        echo "<script>alert('Successfully Deleted'); </script>";
        redirect('KategoriTutorial','refresh');
    }




}

/* End of file EventName.php */
/* Location: ./application/controllers/EventName.php */