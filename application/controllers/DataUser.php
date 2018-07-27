<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
        { $search = $this->uri->segment(3); }
        else
        {
            if($this->input->post('search'))
            { $search = $this->input->post('search'); }
            else
            { $search = 'null'; }
        }
        
        $total = $this->DataUserModel->getTotal($search);

        if ($total > 0) {
            $limit = 4;
            $start = $this->uri->segment(4, 0);

            $config = [
                'base_url' => base_url() . 'DataUser/index/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,

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
                'results' => $this->DataUserModel->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
            ];
        }

		$this->load->model('DataUserModel');
		//$data["results"] = $this->DataUserModel->getDataUser();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar'); 
		$this->load->view('admin/dataUser', $data);
    }
    
	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('DataUserModel');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        
		if ($this->form_validation->run()==FALSE){
			echo validation_errors();
		}else{

			$config['upload_path']='./assets/img/upload/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$this->DataUserModel->save();
				echo "<script>alert('Successfully Created'); </script>";
				redirect('DataUser','refresh');
			}
		}
	}

	public function update()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
        $this->load->model('DataUserModel');
        
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
		$id = $this->input->post('id');
		
		if ($this->form_validation->run()==FALSE){
		}else{
			$config['upload_path']='./assets/img/upload';
			$config['allowed_types']='gif| |png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('photo')) {
				$this->DataUserModel->updateno($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('DataUser','refresh');
			}else{
				$this->DataUserModel->updateUser($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('DataUser','refresh');
			}
		}
    }

    public function delete($id)
	{
		$this->load->model('DataUserModel');
		//$id = $this->uri->segment(3);
		$this->DataUserModel->deleteUser($id);
		redirect('DataUser','refresh');

	}

}

