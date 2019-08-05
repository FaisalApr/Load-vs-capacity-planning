<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carline_model extends CI_Model {

	
	public function getAllCarline()
	{ 
		$que = $this->db->query("SELECT *, carline.id from carline
									JOIN district on carline.id_district=district.id
								");
		return $que->result();
	}

	public function newCarline($data)
	{
		return $this->db->insert('carline',$data);
	}
	
	public function editCarline($data,$id)
	{	
		$this->db->where('id',$id);
		return $this->db->update('carline',$data);
	}

	public function delCarline($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('carline');
	}	

}

/* End of file carline_model.php */
/* Location: ./application/models/carline_model.php */