<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $data['company']=$session_data['company'];
            $current_controller = $this->router->fetch_class();
            $this->load->library('Acl');
            if (! $this->acl->is_public($current_controller)){
                if (! $this->acl->is_allowed($current_controller, $data['company'])){
                    echo "<script>alert('You Do not Have Permission to Access This'); </script>";
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }
            }
        }else{

            redirect('Login','refresh');
        }
    }
    
    public function index()
	{
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];

        $this->load->model('user_model');
        $id = $data['id'];
        $user = $data['username'];
        $data['username'] = $this->user_model->selectAll($id,$user);

		$this->load->model('InputAdminModel');
        $data["admin_list"] = $this->InputAdminModel->getAdmin();
        $this->load->view('admin/layouts/base_start', $data);
        $this->load->view('admin/coba/index'); 
        $this->load->view('admin/layouts/base_end', $data);
	}

	public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('InputAdminModel');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run()==FALSE){
            echo validation_errors();
        }else{
                $this->InputAdminModel->save();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('Admin','refresh');
        }
    }

    public function delete($id)
    {
        $this->load->model('InputAdminModel');
        //$id = $this->uri->segment(3);
        $this->InputAdminModel->deleteAdmin($id);
        redirect('Admin','refresh');

    }
}
