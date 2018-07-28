<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanUser extends CI_Controller {

	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->library('pdf');
	}
	
    public function pdf()
    {
        $data = [
            "title" => "Data User",
            "data"  => [
                ["kolom1" => "Kolom 1", "kolom2" => "Kolom2"],
                ["kolom1" => "Kolom 1", "kolom2" => "Kolom2"],
                ["kolom1" => "Kolom 1", "kolom2" => "Kolom2"],
            ]
        ];

        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->load_view('laporanUser', $data, 'laporanUser-datauser.pdf');
    }

    public function html()
    {
        $data = [
            "title" => "Contoh",
        ];
        
        $this->load->view('laporanUser', $data);
    }

}
