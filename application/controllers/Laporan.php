<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('pdf');
	}

    public function pdf()
    {
        $data = [
            "title" => "User",
            
        ];

        $data['users_list'] = $this->DataUserModel->getDataUser();

        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->load_view('laporan', $data, 'laporan-user.pdf');
    }

    public function html()
    {
        $data = [
            "title" => "User",
        ];
        
        $this->load->view('laporan', $data);
    }

}
