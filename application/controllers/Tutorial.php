<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		//Do your magic here
		$this->load->helper('url','form');
        $this->load->model('Tutorial_model');
        $this->load->library('pagination','form_validation');
    }
		
	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
        $data1['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
        $data['title'] = 'Tutorial';

        $this->load->model('Tutorial_model');
        $id = $data['id'];
        $data['username'] = $this->Tutorial_model->selectAll($id);
    	$total = $this->Tutorial_model->getTotal();

        if ($total > 0) {
            $limit = 3;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'tutorial/index',
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

            $data = [
                'results' => $this->Tutorial_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
                'tutorial_list' => $this->Tutorial_model->getDataTutorial()
            ];
		}
			$this->load->view('layouts/base_start_member',$data);
			$this->load->view('tutorial/index',$data);
			$this->load->view('layouts/base_end');
    } 
    
    public function show($idTutorial)
		{
	  $tutorial = $this->Tutorial_model->show($idTutorial);
	  $data = [
	    'data' => $tutorial
	  ];
	  $this->load->view('tutorial/show', $data);
		}

		public function create()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
        $idUser = $data ['id'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$this->load->model('Tutorial_model');
		$data["kat_list"] = $this->Tutorial_model->getKatTutorial();
		$this->form_validation->set_rules('nama_tutorial', 'nama_tutorial', 'trim|required');
		$this->form_validation->set_rules('kat_id', 'kat_id', 'trim|required');
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		if ($this->form_validation->run()==FALSE){
			$this->load->view('layouts/base_start_member',$data);
			$this->load->view('tutorial/create',$data);
		}else{

			$config['upload_path']='./assets/img/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('photo_hasil')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('layouts/base_start_member',$data);
				$this->load->view('tutorial/create',$error);
				$this->load->view('layouts/base_end');
			} else {
				$this->Tutorial_model->insertTutorial($idUser);
				echo "<script>alert('Successfully Created'); </script>";
				$data = [
                  'tutorial_list' => $this->Tutorial_model->getDataTutorial()
                ];
				redirect('tutorial/createStep');
			}
		}
	}

	public function cekDbTutorial()
        {
            $this->load->model('Tutorial_model');
            $idTutorial = $this->input->post('use'); 
            $result = $this->Tutorial_model->tutorial($nama_tutorial,$kat_id,$photo_hasil);
            if($result){
                $sess_array = array();
                foreach ($result as $key) {
                    $sess_array = array(
                        'idTutorial'=>$key->id,
                        'nama_'=>$key->username,
                        'company'=>$key->company
                    );
                    $this->session->set_userdata('tutorial',$sess_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDbTutorial',"login failed");
                return false;
            }
        }
	public function createStep()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
		$data['id']=$session_data['id'];
		$data['tutorial_id']=$this->session->set_userdata('tutorial','idTutorial');
        $tutorial_id = $data ['tutorial_id'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$this->load->model('Tutorial_model');
		$data["tutorial_list"] = $this->Tutorial_model->getTutorial();
		$this->form_validation->set_rules('step', 'nama_tutorial', 'trim|required');
		$this->form_validation->set_rules('foto_hasil', 'foto_tutorial', 'trim|required');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('layouts/base_start_member',$data);
			$this->load->view('tutorial/create',$data);
		}else{

			$config['upload_path']='./assets/img/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('foto_hasil')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('layouts/base_start_member',$data);
				$this->load->view('tutorial/create',$error);
				$this->load->view('layouts/base_end');
			} else {
				$this->Tutorial_model->saveAll();
				echo "<script>alert('Successfully Created'); </script>";
				$data = [
                  'tutorial_list' => $this->Tutorial_model->getDataTutorial()
                ];
				redirect('tutorial');
			}
		}
    }
		public function update()
		{
					$this->form_validation->set_rules('nama_tutorial', 'nama_tutorial', 'trim|required');
					$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('foto_tutorial', 'foto_tutorial', 'trim|required');
			$id = $this->uri->segment(3);
			$data["tutorial"] = $this->Tutorial_model->getTutorial($id);
			if ($this->form_validation->run()==FALSE){
				$this->load->view('tutorial/update',$data);
			}else{
				$this->Tutorial_model->updateById($id);
				echo "<script>alert('Successfully Updated'); </script>";
				$data["tutorial_list"] = $this->Tutorial_model->getDataTutorial();
				$this->load->view('tutorial/index',$data);
			}
		}
		public function delete()
		{
			echo "<script>alert('Successfully Deleted'); </script>";
			$id = $this->uri->segment(3);
			$this->Tutorial_model->deleteById($id);
			$data["tutorial_list"] = $this->Tutorial_model->getDataTutorial();
			$this->load->view('tutorial/index',$data);
	
		}

		public function search() {
			$keyword    =   $this->input->post('cari'); //tergantung namenya apa
			$data['results']    =   $this->Tutorial_model->cari($keyword);
			$this->load->view('tutorial/index',$data);
	}

}