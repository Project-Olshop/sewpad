<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
        $this->load->model('User_model');
		$this->load->model('Tutorial_model');
    } 

	public function index()
	{
            $total = $this->Tutorial_model->getTotal();
            if ($total > 0) {
                $limit = 3;
                $start = $this->uri->segment(3, 0);

                $config = [
                    'base_url' => base_url() . 'Member',
                    'total_rows' => $total,
                    'per_page' => $limit,
                    'uri_segment' => 3,

                    // Bootstrap 3 Pagination
                    'first_link' => '&laquo;',
                    'last_link' => '&raquo;',
                    'next_link' => 'Next',
                    'prev_link' => 'Prev',
                    'full_tag_open' => '<ul class="pagination">',
                    'full_tag_close' => '</ul>',
                    'num_tag_open' => '<li>',
                    'num_tag_close' => '</li>',
                    'cur_tag_open' => '<li class="active"><span>',
                    'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                    'next_tag_open' => '<li>',
                    'next_tag_close' => '</li>',
                    'prev_tag_open' => '<li>',
                    'prev_tag_close' => '</li>',
                    'first_tag_open' => '<li>',
                    'first_tag_close' => '</li>',
                    'last_tag_open' => '<li>',
                    'last_tag_close' => '</li>',
                ];
                $this->pagination->initialize($config);
                if($this->session->userdata('logged_in')){
                    $session_data=$this->session->userdata('logged_in');
                    $idTutorial = $this->input->post('idTutorial');
                    $data = [
                        'results' => $this->Tutorial_model->list($limit, $start),
                        'links' => $this->pagination->create_links(),
                        'tutorial_list' => $this->Tutorial_model->getDataTutorial($idTutorial),
                        'title' => 'Home Member',
                        'username' => $session_data['username'],
                        'company' => $session_data['company'],
                        'id' => $session_data['id'],
                    ];
                    $this->load->view('layouts/base_start_member',$data);
                    $this->load->view('member/index' , $data);
                    $this->load->view('layouts/base_end',$data);
                }

		}else{
                $data['title'] = 'Home';
                $this->load->view('home',$data);
                // $this->load->view('user/footer',$data);
		}
		// $this->load->view('member/index');
    }

    public function tutorialMember(){

    }
    
}
