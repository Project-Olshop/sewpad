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
		
		if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Member') {
                redirect('HomeAdmin');
            }
        } else {
            redirect('Login');
        }
	}

	public function edit($id)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
		$idUser = $data ['id'];
		
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$this->load->model('Tutorial_model');
		
		$data['tutorial'] = $this->Tutorial_model->getTutorial($id);
		$data["kategori"] = $this->Tutorial_model->getKatTutorial();
		$data["step"] = $this->Tutorial_model->getStep($id);

		if($data['tutorial'][0]['idUser'] != $idUser) {
			redirect('home');
		}
		
		$this->form_validation->set_rules('nama_tutorial', 'nama tutorial', 'trim|required');
		$this->form_validation->set_rules('kat_id', 'kategori tutorial', 'trim|required');
		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('layouts/base_start_member',$data);
			$this->load->view('tutorial/update');
		}else{
			if(isset($_FILES['photo_hasil']['name']) && $_FILES['photo_hasil']['name'] != '') {
				$config['upload_path']='./assets/img/';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']=1000000000;
				$config['max_width']=10240;
				$config['max_height']=7680;
				
				$this->load->library('upload', $config);
				if (! $this->upload->do_upload('photo_hasil')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('layouts/base_start_member',$data);
					$this->load->view('tutorial/update',$error);
					$this->load->view('layouts/base_end');
				} else {
					$this->Tutorial_model->updateTutorialWithImage($idUser);
					echo "<script>alert('Successfully Updated'); </script>";
					redirect('tutorial/edit/' . $id, 'refresh');
				}
			} else {
				$this->Tutorial_model->updateTutorial($idUser);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('tutorial/edit/' . $id, 'refresh');
			}
		}
	}
		
	public function index()
	{
		$this->load->model('User_model');
        $total=$this->User_model->getTutorialHome();
		$config['base_url'] = base_url() . "member/index";
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config);

        $this->load->model('m_home');
        
        if($this->session->userdata('logged_in')){
            $session_data=$this->session->userdata('logged_in');
            $data = [
                'results' => $this->m_home->getAll($config),
                'title' => 'Home Member',
                'username' => $session_data['username'],
                'company' => $session_data['company'],
                'id' => $session_data['id'],
            ];
            $this->load->view('layouts/base_start_member',$data);
            $this->load->view('member/index' , $data);
            $this->load->view('layouts/base_end',$data);
        }
    }  
    
    public function show($idTutorial)
	{
      	        $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
                $data['company']=$session_data['company'];
                $data['id']=$session_data['id'];
		$data['tutorial'] = $this->Tutorial_model->show($idTutorial);
		$data['step'] = $this->Tutorial_model->getStep($idTutorial);
		$this->load->view('tutorial/show', $data);
	}

        public function download($idTutorial) {
                $this->load->library('pdf');
               
                $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
                $data['company']=$session_data['company'];
                $data['id']=$session_data['id'];
		$data['tutorial'] = $this->Tutorial_model->show($idTutorial);
		$data['step'] = $this->Tutorial_model->getStep($idTutorial);
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->load_view('tutorial/download', $data);
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
		
		$data["kategori"] = $this->Tutorial_model->getKatTutorial();
		
		$this->form_validation->set_rules('nama_tutorial', 'nama tutorial', 'trim|required');
		$this->form_validation->set_rules('kat_id', 'kategori tutorial', 'trim|required');
		
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
				$id = $this->Tutorial_model->insertTutorial($idUser);
				echo "<script>alert('Successfully Created'); </script>";
				redirect('tutorial/edit/' . $id);
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
		
	public function deleteStep($idStep, $idTutorial) {
		$this->Tutorial_model->deleteStep($idStep);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('tutorial/edit/' . $idTutorial);
	}

	public function deleteTutorial($idTutorial) {
		$this->Tutorial_model->_deleteTutorial($idTutorial);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('MemberDetail');
	}

	public function createStep()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
		$data['id']=$session_data['id'];
		
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$this->load->model('Tutorial_model');

		$data['tutorial'] = $this->Tutorial_model->getTutorial($this->input->post('tutorial_id'));
		
		if($data['tutorial'][0]['idUser'] != $data['id']) {
			redirect('home');
		}
		
		$config['upload_path']='./assets/img/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']=1000000000;
		$config['max_width']=10240;
		$config['max_height']=7680;

		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('layouts/base_start_member',$data);
			$this->load->view('tutorial/update',$error);
			$this->load->view('layouts/base_end');
		} else {
			$this->Tutorial_model->insertStep();
			echo "<script>alert('Successfully Created'); </script>";
			redirect('tutorial/edit/' . $this->input->post('tutorial_id'));
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