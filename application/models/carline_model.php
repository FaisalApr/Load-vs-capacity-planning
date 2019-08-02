<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carline_model extends CI_Model {

	
	public function getAllCarline()
	{ 
		$que = $this->db->query("SELECT * from carline");

		return $que->result();
	}	

}

/* End of file carline_model.php */
/* Location: ./application/models/carline_model.php */