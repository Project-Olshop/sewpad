<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        public function index()
        {
            $this->load->view('loginView');
        }

        public function logout()
        {
            # code...
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }

        public function cekDb()
        {
            # code...
            $this->load->model('User_model');
            $username = $this->input->post('username'); 
            $password = $this->input->post('password'); 
            $result = $this->User_model->login($username,$password);
            if($result)
            {
                $data = [
                    'tipe' => $result->company,
                    'username' => $result->username
                ];
                $this->session->set_userdata($data);

                if($this->session->tipe=='admin'){
                    redirect('admin/');
                }
                else{redirect('member/');}
                
            }
            else
            {
                redirect('login/');
            }
        }

        public function register()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                # code...
                $this->load->view('registerView');
            } else {
                $this->load->model('user');
                $this->user->insert();
                redirect('login','refresh');
            }
        }

    }
    
    /* End of file Controllername.php */
    
?>