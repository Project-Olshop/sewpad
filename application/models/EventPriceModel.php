<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EventPriceModel extends CI_Model
	{
		public function getPriceById($id)
		{
			$query = $this->db->query("SELECT * from eventprice as p inner join eventseat as s on p.seat_id = s.idSeat inner join eventschedule as d on p.schedule_id = '$id' and s.venue_id = d.venue_id");
			return $query->result();
		}


    	public function getSeat($id){
			$query = $this->db->query("SELECT * from eventseat inner join eventschedule as d on eventseat.venue_id= d.venue_id LEFT join eventprice on eventseat.idSeat = eventprice.seat_id where eventprice.seat_id is null and d.idSchedule=$id");
            	return $query->result();
    	}


		public function insertPrice($fkId,$id)
		{
			$object = array(
				'seat_id' => $fkId,
				'schedule_id' => $id,
				'availableTicket' => $this->input->post('cap'),
				'price' => $this->input->post('price')
					);
			$this->db->insert('eventprice', $object);
		}

		public function updateById($id)
		{
			$data = array(
				'availableTicket' => $this->input->post('cap'),
				'price' => $this->input->post('price')
			);
			$this->db->where('idPrice', $id);
			$this->db->update('eventprice', $data);
		}

		public function delete($id)
		{ 
        	$this->db->where('idPrice',$id);
		$query = $this->db->delete('eventprice'); 
        }

	}