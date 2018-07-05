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

        public function cekDb($password)
        {
            # code...
            $this->load->model('user');
            $username = $this->input->post('username'); 
            $result = $this->user->login($username,$password);
            if($result){
                $session_array = array();
                foreach ($result as $key) {
                    $session_array = array(
                        'id'=>$key->id,
                        'username'=>$key->username
                    );
                    $this->session->set_userdata('logged_in',$session_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"login gagal");
                return false;
            }
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
            if ($this->form_validation->run() == FALSE) {
                # code...
                $this->load->view('loginView');
            } else {
                redirect('welcome','refresh');
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