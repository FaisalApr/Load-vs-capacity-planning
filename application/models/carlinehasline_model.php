<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carlinehasline_model extends CI_Model {

	
	public function getChLByCrln($id)
	{ 
		$que = $this->db->query("SELECT *,carline_has_line.id as id_carhasl from carline_has_line join line on carline_has_line.id_line=line.id where id_carline=$id ");

		return $que->result();
	}		

}

/* End of file carlinehasline_model.php */
/* Location: ./application/models/carlinehasline_model.php */