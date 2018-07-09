<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventArtist extends CI_Controller {

    public function index()
    {
        $this->load->model('EventArtist');
        $data["eventartist_list"] = $this->EventArtist->getArtist();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/artistEvent', $data);
    }

    public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('EventArtistModel');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        if ($this->form_validation->run()==FALSE){
            echo validation_errors();
        }else{

            $config['upload_path']='./assets/imgEvent/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('pict')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $this->EventNameModel->save();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('EventArtist','refresh');
            }
        }
    }

    public function update()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('EventArtistModel');
        $this->form_validation->set_rules('name', 'Event Artist', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        
        $id = $this->input->post('id');

        if ($this->form_validation->run()==FALSE){

        }else{

            $config['upload_path']='./assets/imgEvent/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('pict')) {
                $this->EventArtist->updateno($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('EventArtist','refresh');
                
            }else{
                
                $this->EventArtist->updateArtist($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('EventArtist','refresh');
        }
    }
    }

    public function delete($id)
    {
        $this->load->model('EventArtistModel');
        //$id = $this->uri->segment(3);
        $this->EventArtist->deleteArtist($id);
        redirect('EventArtist','refresh');

    }




}

/* End of file EventName.php */
/* Location: ./application/controllers/EventName.php */