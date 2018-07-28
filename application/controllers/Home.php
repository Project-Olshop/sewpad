<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Tutorial_model');
	}
	
	public function index()
	{
		$data = [];
        $total = $this->Tutorial_model->getTotal();

        if ($total > 0) {
            $limit = 3;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'home',
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
			$idTutorial = $this->input->post('idTutorial');
            $data = [
                'results' => $this->Tutorial_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
				'tutorial_list' => $this->Tutorial_model->getDataTutorial($idTutorial),
				'title' => 'Home',
            ];
        }
		$this->load->view('layouts/base_start', $data);
		$this->load->view('home', $data);
	}

	public function allTutorial(){
		$this->load->model('Tutorial_model');
		$data["tutorial_list"] = $this->Tutorial_model->getDataTutorial()();
		$data["kat_list"] = $this->Tutorial_model->getKatTutorial();
		$data['search']=$this->Tutorial_model->allTutorial();
		$data['detail'] = 'All Tutorial';
		$this->load->view('layouts/base_start_member',$data);
		$this->load->view('home',$data);
		$this->load->view('layouts/base_end');
}
}
