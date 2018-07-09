<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventArtistModel extends CI_Model {

	 public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getArtist()
    {
        $query = $this->db->get('eventartist');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

   
 

    public function save()
    {
        $data = array(
            'artist'		=> $this->input->post('artist'),
            'gender'		=> $this->input->post('gender'),
            'birthdate'		=> $this->input->post('date'),
            'pict'          => $this->upload->data('file_name')
        );
        $this->db->insert('eventartist',$data);
    } 
    public function getArtistNamebyID($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('eventartist');
        return $query->result();
    }

    public function deleteArtist($id)
    {
        $this->db->where('idArtist', $id);
        $this->db->delete('eventartist');
    }

    public function updateArtist($id)
    {
        $data = array(
            'artist'		=> $this->input->post('artist'),
            'gender'		=> $this->input->post('gender'),
            'birthdate'		=> $this->input->post('date'),
            'pict'          => $this->upload->data('file_name')
        );
         $this->db->where('idArtist', $id);
        $this->db->update('eventartist', $data);
    }

    public function updateno($id)
    {
        $data = array(
			'artist'		=> $this->input->post('artist'),
            'gender'		=> $this->input->post('gender'),
            'birthdate'		=> $this->input->post('date'),
        );
         $this->db->where('idArtist', $id);
        $this->db->update('eventartist', $data);
    }

}

/* End of file EventArtistModel.php */
/* Location: ./application/models/EventArtistModel.php */