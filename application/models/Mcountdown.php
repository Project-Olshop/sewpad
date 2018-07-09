<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcountdown extends CI_Model {

		public function time($start){
 				$this->db->insert('countdowntime', $start);
 					if($this->db->affected_rows()>0){
 						return true;
 					}else{
 						return false;
 					}
 		}

 		public function select_time(){
 				$query = $this->db->query("SELECT date, startTime from eventschedule where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc;");
 				if($query->num_rows()>0){
 						return $query->row();
 				}else{
 					$ha = 'tidak ada event';
 					return $ha;
 				}
 		}
 		public function count_time(){
 				$query = $this->db->query("SELECT COUNT(date) from eventschedule where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc");
 				return $query->num_rows();
 		}
}

/* End of file Mcountdown.php */
/* Location: ./application/models/Mcountdown.php */